function TableCtrl($scope) {
    $scope.click = function (stock) {
        if (stock.checked) {
            $scope.tickers[stock.id] = $scope.data[stock.id];
        } else {
            delete $scope.tickers[stock.id];
        }
    };

    $scope.tickers = {};

    $scope.keys = ["open", "high", "low", "last_trade", "volume", "52_week_high", "market_cap"];
    $scope.labels = {
        open: "Open",
        high: "High",
        low: "Low",
        last_trade: "Last",
        market_cap: "Market Cap",
        pe_ratio: "PE",
        eps: "EPS",
        volume: "Volume",
            "52_week_high": "52 Week High",
        dividend: "Dividend",
        eps_est_annual: "EPS Annual Estimate"
    };

    $scope.stocks = [{
        id: "GOOG",
        checked: false
    }, {
        id: "AA",
        checked: false
    }, {
        id: "INTC",
        checked: false
    }, {
        id: "MSFT",
        checked: false
    }];

    $scope.data = {
        AA: {
            "open": "8.91",
                "high": "8.97",
                "low": "8.80",
                "last_trade": "8.83",
                "market_cap": "9,421,000,000",
                "pe_ratio": "130.14",
                "eps": "0.07",
                "volume": "10,775,167",
                "52_week_high": "12.93",
                "dividend": "0.12",
                "eps_est_annual": "0.29",
                "eps_est_nextquarter": "0.08",
                "last_trade_date": "2012-08-13 00:00:00"
        },
        GOOG: {
            "open": "646.98",
                "high": "660.15",
                "low": "646.68",
                "last_trade": "660.01",
                "market_cap": "215,800,000,000",
                "pe_ratio": "19.03",
                "eps": "33.73",
                "volume": "3,268,073",
                "52_week_high": "670.25",
                "dividend": "0.00",
                "eps_est_annual": "42.53",
                "eps_est_nextquarter": "11.77",
                "last_trade_date": "2012-08-13 00:00:00"
        },
        MSFT: {
            "open": "30.38",
                "high": "30.46",
                "low": "30.16",
                "last_trade": "30.39",
                "market_cap": "254,800,000,000",
                "pe_ratio": "15.21",
                "eps": "2.00",
                "volume": "23,053,520",
                "52_week_high": "32.95",
                "dividend": "0.76",
                "eps_est_annual": "3.02",
                "eps_est_nextquarter": "0.90",
                "last_trade_date": "2012-08-13 00:00:00"
        },
        INTC: {
            "open": "26.76",
                "high": "26.83",
                "low": "26.41",
                "last_trade": "26.69",
                "market_cap": "133,500,000,000",
                "pe_ratio": "11.41",
                "eps": "2.36",
                "volume": "23,623,918",
                "52_week_high": "29.27",
                "dividend": "0.86",
                "eps_est_annual": "2.39",
                "eps_est_nextquarter": "0.72",
                "last_trade_date": "2012-08-13 00:00:00"
        }
    };

}
TableCtrl.$inject = ['$scope'];