$(".loading").hide();
$(".error").hide();


function getValue(stockCode) {
    //stockCode = $("#stockCode").val().toUpperCase();
    // var javaScriptVar = "?php echo json_encode($somevar); ?>;";
    // console.log(javaScriptVar);
    getStockData(stockCode);
};



var organizationName;


function slides() {

    $("#slider_amirol").slider({
        range: "min",
        animate: true,
        value: 30,

        min: 0,
        max: 1000,
        step: 1,
        slide: function(event, ui) {
            update(1, ui.value); //changed
            calcualtePrice(ui.value);
        }
    });

    $("#slider_amirol2").slider({
        range: "min",
        animate: true,
        value: bid,

        min: 0,
        max: bid * 2,
        step: 1,

        slide: function(event, ui) {
            update2(1, ui.value); //changed
            calcualtePrice(ui.value);
        }
    });

    calcualtePrice();
};



function update(slider, val) {

    if (undefined === val) val = 0;
    var amount = val;

    $('#sliderVal').val(val);

    $('#slider_amirol a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> ' + amount + ' <span class="glyphicon glyphicon-chevron-right"></span></label>');
}


function update2(slider, val) {
    if (undefined === val) val = 0;
    var amount2 = val;

    $('#sliderVal2').val(val);

    $('#slider_amirol2 a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> ' + amount2 + ' <span class="glyphicon glyphicon-chevron-right"></span></label>');


}

function calcualtePrice(val) {

    shares = $('#sliderVal').val();
    var totalPayout = divPerQuart * shares;
    totalPayout = totalPayout.toFixed(2);

    price = $('#sliderVal2').val();
    var totalInvestment = price * shares
    totalInvestment = totalInvestment.toFixed(2);

    $("#total").val(totalPayout);
    $("#total12").val(totalInvestment);
    $("#shares").val(shares);

}

function getStockData(stockCode) {

    // Get stock data
    //var json = $.getJSON("get_stock_data.php?q="+stockCode, function(data) {
    //console.log("got JSON");
    //    console.log("got stock data");
    //    console.log(data);
    //})


    var json2 = $.getJSON("http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22" + stockCode + "%22)&env=store://datatables.org/alltableswithkeys&format=json", function() {
        console.log("success yahoo");
    })

    var json = $.getJSON("http://www.quandl.com/api/v1/datasets/WIKI/" + stockCode + ".json?collapse=daily&auth_token=hM_FtE8cFi1AC-e3Sufo", function() {
        console.log("success quandl");
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
        console.log(json2);

        stockData = json.responseJSON.data;

        organization = json.responseJSON.name;
        organization = organization.split("(");
        organizationName = organization[0].replace(/ /g, "%20"); // eg. Apple Inc.
        organizationCode = organization[1].replace(")", ""); // eg. AAPL

        peGRatio = json2.responseJSON.query.results.quote.PEGRatio;
        peGRatio = parseFloat(peGRatio);
        console.log("PEGRATIO", peGRatio);

        peRatio = json2.responseJSON.query.results.quote.PERatio;
        peRatio = parseFloat(peRatio);
        console.log("PE RATIO", peRatio);

        EPS = json2.responseJSON.query.results.quote.EarningsShare;
        EPS = parseFloat(EPS);

        // bid = json2.responseJSON.query.results.quote.Ask;
        // bid = parseFloat(bid);
        bid = stockData[0][4];
        console.log("PRICE", bid);

        currentEarnings = json2.responseJSON.query.results.quote.EPSEstimateCurrentYear;
        currentEarnings = parseFloat(currentEarnings);

        nextYear = json2.responseJSON.query.results.quote.EPSEstimateNextYear;
        nextYear = parseFloat(nextYear);


        meanEPS = ((currentEarnings + nextYear) / 2.0);

        forwardPE = (bid / meanEPS);
        forwardPE = forwardPE.toFixed(2);
        forwardPE = parseFloat(forwardPE);
        console.log("FORWARD", forwardPE);

        divYield = json2.responseJSON.query.results.quote.DividendYield;
        divYield = parseFloat(divYield);

        divPay = json2.responseJSON.query.results.quote.DividendShare;
        divPay = parseFloat(divPay);
        console.log("DIV PAY", divPay)

        exDivDate = json2.responseJSON.query.results.quote.ExDividendDate;

        divDate = json2.responseJSON.query.results.quote.DividendPayDate;

        ebitda = json2.responseJSON.query.results.quote.EBITDA;
        ebitda = parseFloat(ebitda);
        console.log("EBIT", ebitda);

        marketCap = json2.responseJSON.query.results.quote.MarketCapitalization;
        marketCap = parseFloat(marketCap);
        console.log("marketCap", marketCap);


        priceChange = json2.responseJSON.query.results.quote.PercentChange;
        priceChange = parseFloat(priceChange);

        fiftyDay = json2.responseJSON.query.results.quote.PercentChangeFromFiftydayMovingAverage;
        fiftyDay = parseFloat(fiftyDay);

        twoHundredDay = json2.responseJSON.query.results.quote.PercentChangeFromTwoHundreddayMovingAverage;
        twoHundredDay = parseFloat(twoHundredDay);


        bookValue = json2.responseJSON.query.results.quote.BookValue;
        bookValue = parseFloat(bookValue);


        pbv = (bid / bookValue);
        pbv = pbv.toFixed(2);
        pbv = parseFloat(pbv);

        volumeChangeDay = stockData[0][5];
        volumeChangeDay2 = stockData[1][5];
        volumePercentToday = (volumeChangeDay - volumeChangeDay2) / volumeChangeDay2;
        volumePercentToday = volumePercentToday * 100;
        volumePercentToday = volumePercentToday.toFixed(2);


        volumeChangeWeek2 = stockData[6][5];
        volumePercentWeek = (volumeChangeDay - volumeChangeWeek2) / volumeChangeWeek2;
        volumePercentWeek = volumePercentWeek * 100;
        volumePercentWeek = volumePercentWeek.toFixed(2);


        volumeChangeMonth2 = stockData[30][5];
        volumePercentMonth = (volumeChangeDay - volumeChangeMonth2) / volumeChangeMonth2;
        volumePercentMonth = volumePercentMonth * 100;
        volumePercentMonth = volumePercentMonth.toFixed(2);


        volumeChange200 = stockData[200][5];
        volumeChange200 = (volumeChangeDay - volumeChange200) / volumeChange200;
        volumeChange200 = volumeChange200 * 100;
        volumeChange200 = volumeChange200.toFixed(2);

        priceChange2 = stockData[30][4];
        priceChangeMonth = (bid - priceChange2) / priceChange2;
        priceChangeMonth = priceChangeMonth * 100;
        priceChangeMonth = priceChangeMonth.toFixed(2);


        priceWeek = stockData[6][4];
        priceChangeWeek = (bid - priceWeek) / priceWeek;
        priceChangeWeek = priceChangeWeek * 100;
        priceChangeWeek = priceChangeWeek.toFixed(2);


        priceChange200 = stockData[200][4];
        priceChange200 = (bid - priceChange200) / priceChange200;
        priceChange200 = priceChange200 * 100;
        priceChange200 = priceChange200.toFixed(2);


        if (divYield === null || divPay === null || divPay === undefined || divYield === undefined || isNaN(divPay) || isNaN(divYield)) {
            divYield = 0.0;
            divPay = 0.0;
        }

        if (divDate === null || exDivDate === null) {
            divDate = "NA";
            exDivDate = "NA";
        }

        divPerQuart = (divPay / 4);

        $('#currentName').html(organization[0], ".");
        $('#divYield').html("Dividend Yield: " + divYield + "%" + "<br>");
        $('#divPayout').html("Dividend Payout: " + "$ " + divPerQuart + "<br>");

        var now = new Date();
        var stringy = now.getMonth()+1 + "/" + now.getDate() + "/" + now.getFullYear();

        var date = divDate;


        var date2 = exDivDate;

        if (date < stringy || date === 'NA') {

            $('#divdat').html("Payout On: " + divDate + "<p class='text-danger'><span class='glyphicon glyphicon-remove'></span>" + "<br>");


        } else {
            $('#divdat').html("Payout On: " + divDate + "<br>" + "<p class='text-success'><span class='glyphicon glyphicon-ok'></span>" + "<br>");

        }
        if (date2 < stringy || date === 'NA') {

            $('#exDivDate').html("Must own by: " + exDivDate + "<p class='text-danger'><span class='glyphicon glyphicon-remove'></span>" + "<br>");


        } else {
            $('#exDivDate').html("Must own by: " + exDivDate + "<br>" + "<p class='text-success'><span class='glyphicon glyphicon-ok'></span>" + "<br>");

        }


        if (priceChange < 0) {
            $('#currentPrice').html("<p class='text-danger'><span class='glyphicon glyphicon-arrow-down'></span><strong>" + priceChange + "%   (" + bid + ")");

        } else {
            $('#currentPrice').html("<p class='text-success'><span class='glyphicon glyphicon-arrow-up'></span><strong>" + priceChange + "%  (" + bid + ")");

        }

        slides();


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
                width: 780,
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
                name: '50-day EMA',
                linkedTo: 'primary',
                showInLegend: true,
                type: 'trendline',
                algorithm: 'EMA',
                visible: false,
                periods: 50
            }, {
                name: '200-day SMA',
                linkedTo: 'primary',
                showInLegend: true,
                type: 'trendline',
                algorithm: 'SMA',
                visible: false,
                periods: 200
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

        $('#container2').highcharts({

            chart: {
                type: 'bubble',
                zoomType: 'xy',
                width: 700,
            },

            title: {
                text: 'Bubble Size = Market Cap.'
            },
            xAxis: [{
                title: {
                    text: 'Price Change Current'
                }
            }],
            yAxis: [{
                title: {
                    text: 'Current Price'
                }
            }],
            series: [{
                name: stockCode,
                data: [
                    [priceChange, bid, marketCap],
                ]
            }, {
                name: "GOOG",
                data: [
                    [1.48, 552.66, 376.15],
                ]
            }, {
                name: "MSFT",
                data: [
                    [-0.62, 41.35, 339.27]
                ]
            }, {
                name: "AMZN",
                data: [
                    [6.20, 372.57, 173.02]
                ]
            }, {
                name: "ORCL",
                data: [
                    [0.16, 46.13, 182.81]
                ]
            }, {
                name: "FB",
                data: [
                    [0.92, 78.49, 219.67]
                ]
            }, {
                name: "GPRO",
                data: [
                    [0.66, 38.83, 5.01]
                ]
            }]
        });

        $('#pie').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Get to know the company'
            },

            series: [{
                name: 'Dividend Payout',
                data: [divPay]
            }, {
                name: 'p/e growth',
                data: [peGRatio]
            }, {
                name: 'EBITDA',
                data: [peGRatio]
            }, {
                name: 'Price',
                data: [bid]
            }, {
                name: 'Forward P/E',
                data: [forwardPE]
            }, {
                name: 'P/E',
                data: [peRatio]
            }, {
                name: 'Price/BV',
                data: [pbv]
            }]
        });

        $('#safety').highcharts({

                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },

                title: {
                    text: 'PE/G Ratio'
                },

                pane: {
                    startAngle: -150,
                    endAngle: 150,
                    background: [{
                        backgroundColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, '#FFF'],
                                [1, '#333']
                            ]
                        },
                        borderWidth: 0,
                        outerRadius: '109%'
                    }, {
                        backgroundColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, '#333'],
                                [1, '#FFF']
                            ]
                        },
                        borderWidth: 1,
                        outerRadius: '107%'
                    }, {
                        // default background
                    }, {
                        backgroundColor: '#DDD',
                        borderWidth: 0,
                        outerRadius: '105%',
                        innerRadius: '103%'
                    }]
                },

                // the value axis
                yAxis: {
                    min: 0,
                    max: 20,

                    minorTickInterval: 'auto',
                    minorTickWidth: 1,
                    minorTickLength: .110,
                    minorTickPosition: 'inside',
                    minorTickColor: '#666',

                    tickPixelInterval: 30,
                    tickWidth: 2,
                    tickPosition: 'inside',
                    tickLength: 10,
                    tickColor: '#666',
                    labels: {
                        step: 2,
                        rotation: 'auto'
                    },
                    title: {
                        text: 'safety'
                    },
                    plotBands: [{
                        from: 0,
                        to: 2.9,
                        color: '#55BF3B' // green
                    }, {
                        from: 2.9,
                        to: 12.5,
                        color: '#DDDF0D' // yellow
                    }, {
                        from: 12.5,
                        to: 20.0,
                        color: '#DF5353' // red
                    }]
                },

                series: [{
                    name: 'PE/G Ratio',
                    data: [peGRatio]
                }]

            },
            // Add some life
            function(chart) {
                if (!chart.renderer.forExport) {

                }
            });

        $('#container3').highcharts({

            chart: {
                type: 'heatmap',
                width: 700,
                marginTop: 40,
                marginBottom: 80
            },


            title: {
                text: 'The Change Heatmap'
            },

            xAxis: {
                categories: ['Price Change', 'Volume Change', 'MA Change']
            },

            yAxis: {
                categories: ['Today', 'Weekly', 'Monthly', '200 Day'],
                title: null
            },

            colorAxis: {
                min: -1,
                max: 1,
                minColor: '#ef8a62',
                maxColor: '#67a9cf'
            },

            legend: {
                align: 'right',
                layout: 'vertical',
                margin: 0,
                verticalAlign: 'top',
                y: 25,
                symbolHeight: 280
            },

            // tooltip: {
            //     formatter: function() {
            //         return '<b>' + this.series.xAxis.categories[this.point.x] + '</b> sold <br><b>' +
            //             this.point.value + '</b> items on <br><b>' + this.series.yAxis.categories[this.point.y] + '</b>';
            //     }
            // },

            series: [{
                name: 'Percentage Change',
                borderWidth: 1,
                data: [
                    // [0, priceChange, 10],
                    // [0, volumePercentToday, 1],
                    // [0, fiftyDay, 1],
                    // [0, priceChangeYear, 1],
                    // [0, volumePercentWeek, 1]
                    [0, 0, priceChange],
                    [0, 1, priceChangeWeek],
                    [0, 2, priceChangeMonth],
                    [0, 3, priceChange200],
                    [1, 0, volumePercentToday],
                    [1, 1, volumePercentWeek],
                    [1, 2, volumePercentMonth],
                    [1, 3, volumeChange200],
                    [2, 2, fiftyDay],
                    [2, 3, twoHundredDay]

                ],
                dataLabels: {
                    enabled: true,
                    color: '#ffffff'
                }
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