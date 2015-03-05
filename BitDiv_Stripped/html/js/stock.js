$(".loading").hide();
$(".error").hide();

function getValue() {
    stockCode = $("#stockCode").val().toUpperCase();
    console.log("THIS IS SO STUPID");
    getStockData(stockCode);
    console.log(stockCode);
};



var organizationName;

function getStockData(stockCode) {

    // Get stock data
    //var json = $.getJSON("get_stock_data.php?q="+stockCode, function(data) {
    //console.log("got JSON");
    //    console.log("got stock data");
    //    console.log(data);
    //})
    var json = $.getJSON("http://www.quandl.com/api/v1/datasets/WIKI/" + stockCode + ".json?collapse=daily&auth_token=hM_FtE8cFi1AC-e3Sufo", function() {
        console.log("success");
        console.log(stockCode);
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


        $('#currentName').html(organization[0], ".");


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
                width: 900,
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
                // text: organization[0]
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

        // $('#container2').highcharts({

        //     chart: {
        //         type: 'bubble',
        //         zoomType: 'xy',
        //         width: 700,
        //     },

        //     title: {
        //         text: 'Dividend Bubbles'
        //     },

        //     series: [{
        //         data: [
        //             [97, 36, 79],
        //             [94, 74, 60],
        //             [68, 76, 58],
        //             [64, 87, 56],
        //             [68, 27, 73],
        //             [74, 99, 42],
        //             [7, 93, 87],
        //             [51, 69, 40],
        //             [38, 23, 33],
        //             [57, 86, 31]
        //         ]
        //     }, {
        //         data: [
        //             [25, 10, 87],
        //             [2, 75, 59],
        //             [11, 54, 8],
        //             [86, 55, 93],
        //             [5, 3, 58],
        //             [90, 63, 44],
        //             [91, 33, 17],
        //             [97, 3, 56],
        //             [15, 67, 48],
        //             [54, 25, 81]
        //         ]
        //     }, {
        //         data: [
        //             [47, 47, 21],
        //             [20, 12, 4],
        //             [6, 76, 91],
        //             [38, 30, 60],
        //             [57, 98, 64],
        //             [61, 17, 80],
        //             [83, 60, 13],
        //             [67, 78, 75],
        //             [64, 12, 10],
        //             [30, 77, 82]
        //         ]
        //     }]
        // });

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

    articleJson.complete(function() {
        // Delete existing article rows
        $('#table tr').not(function() {
            if ($(this).has('th').length) {
                return true
            }
        }).remove();
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
 * Grid-light theme for Highcharts JS
 * @author Torstein Honsi
 */

// Load the fonts
Highcharts.createElement('link', {
    href: '//fonts.googleapis.com/css?family=Dosis:400,600',
    rel: 'stylesheet',
    type: 'text/css'
}, null, document.getElementsByTagName('head')[0]);

Highcharts.theme = {
    colors: ["#7cb5ec", "#f7a35c", "#90ee7e", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
        "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"
    ],
    chart: {
        backgroundColor: null,
        style: {
            fontFamily: "Dosis, sans-serif"
        }
    },
    title: {
        style: {
            fontSize: '16px',
            fontWeight: 'bold',
            textTransform: 'uppercase'
        }
    },
    tooltip: {
        borderWidth: 0,
        backgroundColor: 'rgba(219,219,216,0.8)',
        shadow: false
    },
    legend: {
        itemStyle: {
            fontWeight: 'bold',
            fontSize: '13px'
        }
    },
    xAxis: {
        gridLineWidth: 1,
        labels: {
            style: {
                fontSize: '12px'
            }
        }
    },
    yAxis: {
        minorTickInterval: 'auto',
        title: {
            style: {
                textTransform: 'uppercase'
            }
        },
        labels: {
            style: {
                fontSize: '12px'
            }
        }
    },
    plotOptions: {
        candlestick: {
            lineColor: '#404048'
        }
    },


    // General
    background2: '#F0F0EA'

};

// Apply the theme
Highcharts.setOptions(Highcharts.theme);