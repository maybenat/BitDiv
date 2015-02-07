$(".loading").hide();
$(".error").hide();

// Stock list array for autocomplete drop down list
var stockCodeList = [];
var json = $.getJSON("tickers.json");

json.complete(function() {
    var stockCodes = json.responseJSON;
    for (var i = 0; i < stockCodes.length; i++) {
        stockCodeList.push(stockCodes[i]["Ticker"]);
    }
    console.log(stockCodeList);
});
var source = stockCodeList;
$("#stockCode").autocomplete({
    source: function(request, response) {
        var term = $.ui.autocomplete.escapeRegex(request.term),
            startsWithMatcher = new RegExp("^" + term, "i"),
            startsWith = $.grep(source, function(value) {
                return startsWithMatcher.test(value.label || value.value || value);
            }),
            containsMatcher = new RegExp(term, "i"),
            contains = $.grep(source, function(value) {
                return $.inArray(value, startsWith) < 0 &&
                    containsMatcher.test(value.label || value.value || value);
            });

        response(startsWith.concat(contains));
    }
});

function getValue() {
    stockCode = $("#stockCode").val().toUpperCase();
    getStockData(stockCode);
};

var organizationName;

function getStockData(stockCode) {

    // Get stock data
    var json = $.getJSON("http://www.quandl.com/api/v1/datasets/WIKI/" + stockCode + ".json?collapse=daily&auth_token=hM_FtE8cFi1AC-e3Sufo", function() {
        console.log("success");
    })

    .fail(function() {
        $(".error").show();
    })

    .success(function() {
        $(".error").hide();
    });

    $(".loading").show();

    var price = [];

    var stockData, organization;

    json.complete(function() {
        $(".loading").hide();
        console.log("Stock price data complete.");

        stockData = json.responseJSON.data;

        organization = json.responseJSON.name;
        organization = organization.split("(");
        organizationName = organization[0].replace(/ /g, "%20"); // eg. Apple Inc.
        organizationCode = organization[1].replace(")", ""); // eg. AAPL


        // Push closing price and date to price array
        for (var i = 0; i < stockData.length; i++) {
            price[i] = [];
            price[i].push(Date.parse(stockData[i][0]));
            price[i].push(stockData[i][4]);
        }

        // Reverse order to make information digestible by Highcharts
        price.reverse();

        // Create the chart
        $('#container').highcharts('StockChart', {
            chart: {
                zoomType: 'xy',
                panning: true,
                panKey: 'shift',
                events: {
                    // On click function in char
                    click: function(event) {
                        // Get x-axis date from click
                        var articleDate = Highcharts.dateFormat('%Y-%m-%d', event.xAxis[0].value);

                        // Make date digestible by Highcharts
                        articleDate = articleDate.replace(/-/g, "");

                        // Get articles with date
                        getArticles(articleDate);
                    }
                }
            },


            title: {
                text: organization[0]
            },

            yAxis: [{
                title: {
                    text: 'Price'
                },
                height: 200,
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            }, {
                title: {
                    text: 'MACD'
                },
                top: 300,
                height: 100,
                offset: 0,
                lineWidth: 2
            }],

            legend: {
                enabled: true,
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },

            plotOptions: {
                series: {
                    marker: {
                        enabled: false,
                    }
                }
            },
            rangeSelector: {
                selected: 1,
            },
            series: [{
                name: 'Price',
                type: 'line',
                tooltip: {
                    valueDecimals: 2
                },
                id: 'primary',
                data: price
            }, {
                name: 'MACD',
                linkedTo: 'primary',
                yAxis: 1,
                showInLegend: true,
                type: 'trendline',
                algorithm: 'MACD'

            }, {
                name: '5-day EMA',
                linkedTo: 'primary',
                showInLegend: true,
                type: 'trendline',
                algorithm: 'EMA',
                periods: 5
            }, {
                name: '20-day EMA',
                linkedTo: 'primary',
                showInLegend: true,
                type: 'trendline',
                algorithm: 'EMA',
                periods: 20
            }, {
                name: 'Histogram',
                linkedTo: 'primary',
                yAxis: 1,
                showInLegend: true,
                type: 'histogram'

            }, {
                name: 'Signal line',
                yAxis: 1,
                linkedTo: 'primary',
                showInLegend: true,
                type: 'trendline',
                algorithm: 'signalLine'

            }]
        });

        // Get today's date
        var d = new Date();

        var month = d.getMonth() + 1;
        var day = d.getDate();

        var todaysDate = d.getFullYear() +
            (('' + month).length < 2 ? '0' : '') + month +
            (('' + day).length < 2 ? '0' : '') + day;

        // Get all articles with today's date
        getArticles(todaysDate);

    });

};

// Searches and gets articles from The New York Times based on 1: Organization (search) 2: Date
function getArticles(date) {

    // Get articles
    var articleJson = $.getJSON("http://api.nytimes.com/svc/search/v2/articlesearch.json?q=" + organizationName + "&begin_date=" + date + "&end_date=" + date + "&api-key=1978a642927f7f7aa19dae13031368b3:17:69577800");
    $(".loading").show();

    articleJson.complete(function() {
        // Delete existing article rows
        $('#table tr').not(function() {
            if ($(this).has('th').length) {
                return true
            }
        }).remove();
        $(".loading").hide();
        console.log("Articles complete.");
        var articles = articleJson.responseJSON.response.docs;
        console.log(articles);

        // Append articles to table with clickable row to article URL
        for (var i = 0; i < articles.length; i++) {
            article_para = articles[i].lead_paragraph;
            if (!article_para) {
                article_para = "Click for more information.";
            };

            $('#table > tbody:last').append("<tr onclick='window.open(&quot;" + articles[i].web_url + "&quot;)'><td><b>" + articles[i].headline.main + "</b><br>" + article_para + "</td></tr>");
        }

        // If no articles were retrieved, notify user
        if (articles.length === 0) {
            $('#wat').html("No articles were found - click on the chart for another date.");
        } else {
            $('#date').html(formatPubDate(articles[0].pub_date) + ".");
            $('#wat').html("");
        }
    });
}

function formatPubDate(date) {
    date = date.split("T");
    return date[0];
}

getStockData("GOOG");
/**
 * Dark theme for Highcharts JS
 * @author Torstein Honsi
 */

// Load the fonts
Highcharts.createElement('link', {
    href: '//fonts.googleapis.com/css?family=Unica+One',
    rel: 'stylesheet',
    type: 'text/css'
}, null, document.getElementsByTagName('head')[0]);

Highcharts.theme = {
    colors: ["#2b908f", "#90ee7e", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
        "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"
    ],
    chart: {
        backgroundColor: {
            linearGradient: {
                x1: 0,
                y1: 0,
                x2: 1,
                y2: 1
            },
            stops: [
                [0, '#2a2a2b'],
                [1, '#3e3e40']
            ]
        },
        style: {
            fontFamily: "'Unica One', sans-serif"
        },
        plotBorderColor: '#606063'
    },
    title: {
        style: {
            color: '#E0E0E3',
            textTransform: 'uppercase',
            fontSize: '20px'
        }
    },
    subtitle: {
        style: {
            color: '#E0E0E3',
            textTransform: 'uppercase'
        }
    },
    xAxis: {
        gridLineColor: '#707073',
        labels: {
            style: {
                color: '#E0E0E3'
            }
        },
        lineColor: '#707073',
        minorGridLineColor: '#505053',
        tickColor: '#707073',
        title: {
            style: {
                color: '#A0A0A3'

            }
        }
    },
    yAxis: {
        gridLineColor: '#707073',
        labels: {
            style: {
                color: '#E0E0E3'
            }
        },
        lineColor: '#707073',
        minorGridLineColor: '#505053',
        tickColor: '#707073',
        tickWidth: 1,
        title: {
            style: {
                color: '#A0A0A3'
            }
        }
    },
    tooltip: {
        backgroundColor: 'rgba(0, 0, 0, 0.85)',
        style: {
            color: '#F0F0F0'
        }
    },
    plotOptions: {
        series: {
            dataLabels: {
                color: '#B0B0B3'
            },
            marker: {
                lineColor: '#333'
            }
        },
        boxplot: {
            fillColor: '#505053'
        },
        candlestick: {
            lineColor: 'white'
        },
        errorbar: {
            color: 'white'
        }
    },
    legend: {
        itemStyle: {
            color: '#E0E0E3'
        },
        itemHoverStyle: {
            color: '#FFF'
        },
        itemHiddenStyle: {
            color: '#606063'
        }
    },
    credits: {
        style: {
            color: '#666'
        }
    },
    labels: {
        style: {
            color: '#707073'
        }
    },

    drilldown: {
        activeAxisLabelStyle: {
            color: '#F0F0F3'
        },
        activeDataLabelStyle: {
            color: '#F0F0F3'
        }
    },

    navigation: {
        buttonOptions: {
            symbolStroke: '#DDDDDD',
            theme: {
                fill: '#505053'
            }
        }
    },

    // scroll charts
    rangeSelector: {
        buttonTheme: {
            fill: '#505053',
            stroke: '#000000',
            style: {
                color: '#CCC'
            },
            states: {
                hover: {
                    fill: '#707073',
                    stroke: '#000000',
                    style: {
                        color: 'white'
                    }
                },
                select: {
                    fill: '#000003',
                    stroke: '#000000',
                    style: {
                        color: 'white'
                    }
                }
            }
        },
        inputBoxBorderColor: '#505053',
        inputStyle: {
            backgroundColor: '#333',
            color: 'silver'
        },
        labelStyle: {
            color: 'silver'
        }
    },

    navigator: {
        handles: {
            backgroundColor: '#666',
            borderColor: '#AAA'
        },
        outlineColor: '#CCC',
        maskFill: 'rgba(255,255,255,0.1)',
        series: {
            color: '#7798BF',
            lineColor: '#A6C7ED'
        },
        xAxis: {
            gridLineColor: '#505053'
        }
    },

    scrollbar: {
        barBackgroundColor: '#808083',
        barBorderColor: '#808083',
        buttonArrowColor: '#CCC',
        buttonBackgroundColor: '#606063',
        buttonBorderColor: '#606063',
        rifleColor: '#FFF',
        trackBackgroundColor: '#404043',
        trackBorderColor: '#404043'
    },

    // special colors for some of the
    legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
    background2: '#505053',
    dataLabelsColor: '#B0B0B3',
    textColor: '#C0C0C0',
    contrastTextColor: '#F0F0F3',
    maskColor: 'rgba(255,255,255,0.3)'
};

// Apply the theme
Highcharts.setOptions(Highcharts.theme);