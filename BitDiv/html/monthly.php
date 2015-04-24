<?php include 'includes/session.php'; ?>

<?php include 'includes/portfolio_populate.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>bitdiv</title>

  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
       <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="js/jquery.dynatable.js"></script>

</head>

<style>
.dynatable-search {
  float: right;
  margin-bottom: 10px;
}

.dynatable-pagination-links {
  float: right;
}

.dynatable-record-count {
  display: block;
  padding: 5px 0;
}

.dynatable-pagination-links span,
.dynatable-pagination-links li {
  display: inline-block;
}

.dynatable-page-link,
.dynatable-page-break {
  display: block;
  padding: 5px 7px;
}

.dynatable-page-link {
  cursor: pointer;
}

.dynatable-active-page,
.dynatable-disabled-page {
  cursor: text;
}
.dynatable-active-page:hover,
.dynatable-disabled-page:hover {
  text-decoration: none;
}

.dynatable-active-page {
  background: #006a72;
  border-radius: 5px;
  color: #fff;
}
.dynatable-active-page:hover {
  color: #fff;
}
.dynatable-disabled-page,
.dynatable-disabled-page:hover {
  background: none;
  color: #999;
}

</style>

<body>
  <div class="app app-header-fixed">

    <?php include 'header.php'; ?>

    <!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">

        <div class="hbox hbox-auto-xs hbox-auto-sm">

          <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">Monthly Dividend Paying Stocks</h1>
          </div>

          <div class="wrapper-md">
            <div class=" col-md-9 col-lg-9 ">
<table class="table table-striped" id="local">
<thead>
        <th>Symbol</th>

    <th>Annualized Div</th>

    <th>Div Yield</th>
    <th>Ex Div Date</th>
        <th>Record Date</th>
            <th>Pay Date</th>
                <th>Next Payout</th>
  </thead>
  <tbody>
  </tbody>    

<script id="music">
[
    {
        "symbol": "EPR",
        "annualized div": "3.63",
        "div yield": "6.0200%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/15/2015",
        "next payout": "0.3025"
    },
    {
        "symbol": "LTC",
        "annualized div": "1.76",
        "div yield": "3.8200%",
        "ex div date": "03/19/2015",
        "record date": "03/23/2015",
        "pay date": "03/31/2015",
        "next payout": "0.17"
    },
    {
        "symbol": "O",
        "annualized div": "2.274",
        "div yield": "4.400%",
        "ex div date": "03/30/2015",
        "record date": "04/01/2015",
        "pay date": "04/15/2015",
        "next payout": "0.1895"
    },
    {
        "symbol": "SBR",
        "annualized div": "5.3297",
        "div yield": "13.1800%",
        "ex div date": "03/12/2015",
        "record date": "03/16/2015",
        "pay date": "03/30/2015",
        "next payout": "0.44414"
    },
    {
        "symbol": "VET",
        "annualized div": "2.58",
        "div yield": "6.1400%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/15/2015",
        "next payout": "0.215"
    },
    {
        "symbol": "SJR",
        "annualized div": "1.1",
        "div yield": "4.8800%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "04/29/2015",
        "next payout": "0.09875"
    },
    {
        "symbol": "MAIN",
        "annualized div": "1.92",
        "div yield": "6.2200%",
        "ex div date": "04/17/2015",
        "record date": "04/21/2015",
        "pay date": "05/15/2015",
        "next payout": "0.175"
    },
    {
        "symbol": "FSC",
        "annualized div": "0.72",
        "div yield": "9.8800%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "04/30/2015",
        "next payout": "0.06"
    },
    {
        "symbol": "CLDT",
        "annualized div": "1.2",
        "div yield": "4.0800%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/24/2015",
        "next payout": "0.1"
    },
    {
        "symbol": "VNR",
        "annualized div": "1.41",
        "div yield": "9.8800%",
        "ex div date": "03/30/2015",
        "record date": "04/01/2015",
        "pay date": "04/14/2015",
        "next payout": "0.1175"
    },
    {
        "symbol": "PSEC",
        "annualized div": "1",
        "div yield": "11.8900%",
        "ex div date": "04/28/2015",
        "record date": "04/30/2015",
        "pay date": "05/21/2015",
        "next payout": "0.08333"
    },
    {
        "symbol": "HLSS",
        "annualized div": "2.16",
        "div yield": "12.9300%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/10/2015",
        "next payout": "0.18"
    },
    {
        "symbol": "BTE",
        "annualized div": "1.2",
        "div yield": "7.6100%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/15/2015",
        "next payout": "0.1"
    },
    {
        "symbol": "CRT",
        "annualized div": "1.3886",
        "div yield": "7.1400%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/14/2015",
        "next payout": "0.115716"
    },
    {
        "symbol": "GLAD",
        "annualized div": "0.84",
        "div yield": "9.3500%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.07"
    },
    {
        "symbol": "SJT",
        "annualized div": "0.3206",
        "div yield": "2.6400%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/14/2015",
        "next payout": "0.026714"
    },
    {
        "symbol": "HGT",
        "annualized div": "0.2206",
        "div yield": "3.6200%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/14/2015",
        "next payout": "0.01838"
    },
    {
        "symbol": "MTR",
        "annualized div": "1.9512",
        "div yield": "8.8100%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/30/2015",
        "next payout": "0.162596"
    },
    {
        "symbol": "ARCP",
        "annualized div": "1",
        "div yield": "10.1500%",
        "ex div date": "12/04/2014",
        "record date": "12/08/2014",
        "pay date": "12/15/2014",
        "next payout": "0.0833333"
    },
    {
        "symbol": "ROYT",
        "annualized div": "0.093",
        "div yield": "2.4100%",
        "ex div date": "04/01/2015",
        "record date": "04/06/2015",
        "pay date": "04/14/2015",
        "next payout": "0.00775"
    },
    {
        "symbol": "COLE",
        "annualized div": "0.72",
        "div yield": "4.8100%",
        "ex div date": "02/03/2014",
        "record date": "01/31/2014",
        "pay date": "02/03/2014",
        "next payout": "0.06"
    },
    {
        "symbol": "GG",
        "annualized div": "0.6",
        "div yield": "3.300%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/20/2015",
        "next payout": "0.05"
    },
    {
        "symbol": "IRC",
        "annualized div": "0.57",
        "div yield": "5.2900%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/17/2015",
        "next payout": "0.0475"
    },
    {
        "symbol": "LINE",
        "annualized div": "1.25",
        "div yield": "11.0600%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/17/2015",
        "next payout": "0.1042"
    },
    {
        "symbol": "ERF",
        "annualized div": "0.6",
        "div yield": "5.8800%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/15/2015",
        "next payout": "0.05"
    },
    {
        "symbol": "TAHO",
        "annualized div": "0.24",
        "div yield": "2.0700%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/26/2015",
        "next payout": "0.02"
    },
    {
        "symbol": "GAIN",
        "annualized div": "0.6",
        "div yield": "8.00%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.06"
    },
    {
        "symbol": "ITUB",
        "annualized div": "0.0495",
        "div yield": "0.4600%",
        "ex div date": "03/31/2015",
        "record date": "04/03/2015",
        "pay date": "05/14/2015",
        "next payout": "0.004122"
    },
    {
        "symbol": "PBT",
        "annualized div": "0.2589",
        "div yield": "3.1600%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/14/2015",
        "next payout": "0.021577"
    },
    {
        "symbol": "PGH",
        "annualized div": "0.24",
        "div yield": "8.0500%",
        "ex div date": "03/19/2015",
        "record date": "03/23/2015",
        "pay date": "04/15/2015",
        "next payout": "0.02"
    },
    {
        "symbol": "LNCO",
        "annualized div": "1.25",
        "div yield": "12.9500%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/18/2015",
        "next payout": "0.1042"
    },
    {
        "symbol": "NDRO",
        "annualized div": "0.4453",
        "div yield": "10.7800%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/14/2015",
        "next payout": "0.037109"
    },
    {
        "symbol": "ITIP",
        "annualized div": "0.12",
        "div yield": "0.2800%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.010001"
    },
    {
        "symbol": "RAVI",
        "annualized div": "0.3949",
        "div yield": "0.5200%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.032906"
    },
    {
        "symbol": "JMI",
        "annualized div": "1.44",
        "div yield": "18.7700%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "04/27/2015",
        "next payout": "0.09"
    },
    {
        "symbol": "NVJ-A",
        "annualized div": "0.23",
        "div yield": "2.2900%",
        "ex div date": "04/03/2013",
        "record date": "04/05/2013",
        "pay date": "05/01/2013",
        "next payout": "0.004569"
    },
    {
        "symbol": "NVX-A",
        "annualized div": "0.234996",
        "div yield": "2.3500%",
        "ex div date": "08/13/2013",
        "record date": "08/15/2013",
        "pay date": "09/03/2013",
        "next payout": "0.019583"
    },
    {
        "symbol": "NXE-C",
        "annualized div": "0.234996",
        "div yield": "2.3100%",
        "ex div date": "04/03/2013",
        "record date": "04/05/2013",
        "pay date": "05/01/2013",
        "next payout": "0.005639"
    },
    {
        "symbol": "NXI-D",
        "annualized div": "0.29",
        "div yield": "2.8600%",
        "ex div date": "04/03/2013",
        "record date": "04/05/2013",
        "pay date": "05/01/2013",
        "next payout": "0.005736"
    },
    {
        "symbol": "NXJ-A",
        "annualized div": "0.23",
        "div yield": "2.300%",
        "ex div date": "08/13/2013",
        "record date": "08/15/2013",
        "pay date": "09/03/2013",
        "next payout": "0.019167"
    },
    {
        "symbol": "HYLS",
        "annualized div": "2.88",
        "div yield": "5.7100%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.24"
    },
    {
        "symbol": "PFEM",
        "annualized div": "0.985",
        "div yield": "5.2900%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.08208"
    },
    {
        "symbol": "BBDO",
        "annualized div": "0.3",
        "div yield": "3.3700%",
        "ex div date": "06/25/2014",
        "record date": "06/27/2014",
        "pay date": "07/25/2014",
        "next payout": "0.083682"
    },
    {
        "symbol": "MMD",
        "annualized div": "1.15",
        "div yield": "6.2400%",
        "ex div date": "03/12/2015",
        "record date": "03/16/2015",
        "pay date": "03/31/2015",
        "next payout": "0.098"
    },
    {
        "symbol": "EDI",
        "annualized div": "1.81",
        "div yield": "12.5300%",
        "ex div date": "04/16/2015",
        "record date": "04/20/2015",
        "pay date": "04/30/2015",
        "next payout": "0.1511"
    },
    {
        "symbol": "SPHD",
        "annualized div": "1.1353",
        "div yield": "3.4400%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.09461"
    },
    {
        "symbol": "ARDC",
        "annualized div": "1.4",
        "div yield": "8.600%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.117"
    },
    {
        "symbol": "RVNU",
        "annualized div": "0.7218",
        "div yield": "2.7300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.06015"
    },
    {
        "symbol": "GYLD",
        "annualized div": "1.8276",
        "div yield": "7.4900%",
        "ex div date": "03/16/2015",
        "record date": "03/18/2015",
        "pay date": "03/23/2015",
        "next payout": "0.1523"
    },
    {
        "symbol": "ACG",
        "annualized div": "0.41",
        "div yield": "5.3700%",
        "ex div date": "04/08/2015",
        "record date": "04/10/2015",
        "pay date": "04/17/2015",
        "next payout": "0.03455"
    },
    {
        "symbol": "ACP",
        "annualized div": "1.44",
        "div yield": "9.500%",
        "ex div date": "04/09/2015",
        "record date": "04/13/2015",
        "pay date": "04/30/2015",
        "next payout": "0.12"
    },
    {
        "symbol": "AFB",
        "annualized div": "0.7908",
        "div yield": "5.8300%",
        "ex div date": "04/08/2015",
        "record date": "04/10/2015",
        "pay date": "04/17/2015",
        "next payout": "0.0659"
    },
    {
        "symbol": "AGC",
        "annualized div": "0.56",
        "div yield": "8.3100%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.047"
    },
    {
        "symbol": "AGD",
        "annualized div": "0.77",
        "div yield": "7.4400%",
        "ex div date": "04/21/2015",
        "record date": "04/23/2015",
        "pay date": "04/30/2015",
        "next payout": "0.064"
    },
    {
        "symbol": "AGG",
        "annualized div": "2.228",
        "div yield": "2.00%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.18567"
    },
    {
        "symbol": "AGZ",
        "annualized div": "1.4488",
        "div yield": "1.2700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.120735"
    },
    {
        "symbol": "AKP",
        "annualized div": "0.75",
        "div yield": "5.4300%",
        "ex div date": "04/08/2015",
        "record date": "04/10/2015",
        "pay date": "04/17/2015",
        "next payout": "0.0627"
    },
    {
        "symbol": "ALD",
        "annualized div": "1.08",
        "div yield": "2.3400%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.09"
    },
    {
        "symbol": "AOD",
        "annualized div": "0.68",
        "div yield": "7.6100%",
        "ex div date": "04/21/2015",
        "record date": "04/23/2015",
        "pay date": "04/30/2015",
        "next payout": "0.0565"
    },
    {
        "symbol": "AOK",
        "annualized div": "0.3633",
        "div yield": "1.100%",
        "ex div date": "03/03/2015",
        "record date": "03/05/2015",
        "pay date": "03/09/2015",
        "next payout": "0.030275"
    },
    {
        "symbol": "ARK",
        "annualized div": "0.29",
        "div yield": "7.4200%",
        "ex div date": "11/13/2013",
        "record date": "11/15/2013",
        "pay date": "11/29/2013",
        "next payout": "0.024"
    },
    {
        "symbol": "ARR",
        "annualized div": "0.48",
        "div yield": "15.0900%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "04/27/2015",
        "next payout": "0.04"
    },
    {
        "symbol": "ASP",
        "annualized div": "0.66",
        "div yield": "6.3800%",
        "ex div date": "08/01/2014",
        "record date": "08/05/2014",
        "pay date": "08/20/2014",
        "next payout": "0.055"
    },
    {
        "symbol": "AT",
        "annualized div": "0.36",
        "div yield": "12.8100%",
        "ex div date": "02/25/2015",
        "record date": "02/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.03"
    },
    {
        "symbol": "AVK",
        "annualized div": "1.1268",
        "div yield": "6.5100%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0939"
    },
    {
        "symbol": "AWF",
        "annualized div": "0.97",
        "div yield": "7.7200%",
        "ex div date": "04/08/2015",
        "record date": "04/10/2015",
        "pay date": "04/17/2015",
        "next payout": "0.081"
    },
    {
        "symbol": "AYN",
        "annualized div": "0.6716",
        "div yield": "4.8100%",
        "ex div date": "04/08/2015",
        "record date": "04/10/2015",
        "pay date": "04/17/2015",
        "next payout": "0.05597"
    },
    {
        "symbol": "AYT",
        "annualized div": "0.7212",
        "div yield": "1.6700%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/20/2015",
        "next payout": "0.0601"
    },
    {
        "symbol": "BAB",
        "annualized div": "1.3812",
        "div yield": "4.5400%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.1151"
    },
    {
        "symbol": "BABS",
        "annualized div": "2.4223",
        "div yield": "3.7900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.201862"
    },
    {
        "symbol": "BABZ",
        "annualized div": "1.98",
        "div yield": "3.8300%",
        "ex div date": "08/29/2014",
        "record date": "09/03/2014",
        "pay date": "09/05/2014",
        "next payout": "0.174"
    },
    {
        "symbol": "BTT",
        "annualized div": "0.96",
        "div yield": "4.600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.08"
    },
    {
        "symbol": "BAF",
        "annualized div": "0.86",
        "div yield": "5.8500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0685"
    },
    {
        "symbol": "BBF",
        "annualized div": "0.87",
        "div yield": "6.1400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.072375"
    },
    {
        "symbol": "BBK",
        "annualized div": "0.98",
        "div yield": "5.9600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.082"
    },
    {
        "symbol": "BBN",
        "annualized div": "1.58",
        "div yield": "6.9500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.1318"
    },
    {
        "symbol": "BFK",
        "annualized div": "0.9",
        "div yield": "6.2200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0751"
    },
    {
        "symbol": "BFO",
        "annualized div": "0.42",
        "div yield": "2.800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0347"
    },
    {
        "symbol": "BFY",
        "annualized div": "0.84",
        "div yield": "5.7200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.07"
    },
    {
        "symbol": "BFZ",
        "annualized div": "0.87",
        "div yield": "5.6200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0722"
    },
    {
        "symbol": "BGR",
        "annualized div": "1.62",
        "div yield": "7.8800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.135"
    },
    {
        "symbol": "BGT",
        "annualized div": "0.78",
        "div yield": "5.7700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0653"
    },
    {
        "symbol": "BHD",
        "annualized div": "0.94",
        "div yield": "7.2300%",
        "ex div date": "11/13/2013",
        "record date": "11/15/2013",
        "pay date": "11/29/2013",
        "next payout": "0.078"
    },
    {
        "symbol": "BHK",
        "annualized div": "0.91",
        "div yield": "6.700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0755"
    },
    {
        "symbol": "BHL",
        "annualized div": "0.7",
        "div yield": "5.2800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0583"
    },
    {
        "symbol": "BHV",
        "annualized div": "0.834",
        "div yield": "4.7200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0695"
    },
    {
        "symbol": "BHY",
        "annualized div": "0.51",
        "div yield": "7.2500%",
        "ex div date": "10/11/2013",
        "record date": "10/16/2013",
        "pay date": "10/31/2013",
        "next payout": "0.0428"
    },
    {
        "symbol": "BIE",
        "annualized div": "0.91",
        "div yield": "6.1600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.076"
    },
    {
        "symbol": "BIV",
        "annualized div": "2.1044",
        "div yield": "2.4400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.175367"
    },
    {
        "symbol": "BJZ",
        "annualized div": "0.51",
        "div yield": "3.3700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0277"
    },
    {
        "symbol": "BKN",
        "annualized div": "0.924",
        "div yield": "5.8200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.077"
    },
    {
        "symbol": "BKT",
        "annualized div": "0.372",
        "div yield": "5.7700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.031"
    },
    {
        "symbol": "BLE",
        "annualized div": "0.948",
        "div yield": "6.3100%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.079"
    },
    {
        "symbol": "BLH",
        "annualized div": "0.3336",
        "div yield": "2.2200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0256"
    },
    {
        "symbol": "BLJ",
        "annualized div": "0.834",
        "div yield": "5.2400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0695"
    },
    {
        "symbol": "BLV",
        "annualized div": "3.3423",
        "div yield": "3.4700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.278529"
    },
    {
        "symbol": "BLW",
        "annualized div": "1.25",
        "div yield": "7.8600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0995"
    },
    {
        "symbol": "BNA",
        "annualized div": "0.71",
        "div yield": "6.8400%",
        "ex div date": "10/10/2014",
        "record date": "10/15/2014",
        "pay date": "10/31/2014",
        "next payout": "0.0595"
    },
    {
        "symbol": "BND",
        "annualized div": "1.9431",
        "div yield": "2.3300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.161928"
    },
    {
        "symbol": "BNJ",
        "annualized div": "0.9012",
        "div yield": "5.5800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0751"
    },
    {
        "symbol": "BNY",
        "annualized div": "0.83",
        "div yield": "5.6800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.069"
    },
    {
        "symbol": "BPK",
        "annualized div": "0.564",
        "div yield": "3.5300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.047"
    },
    {
        "symbol": "BPP",
        "annualized div": "1.02",
        "div yield": "8.6100%",
        "ex div date": "11/14/2012",
        "record date": "11/16/2012",
        "pay date": "11/23/2012",
        "next payout": "0.085"
    },
    {
        "symbol": "BPS",
        "annualized div": "0.732",
        "div yield": "5.5600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.061"
    },
    {
        "symbol": "BQH",
        "annualized div": "0.8",
        "div yield": "5.5900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0665"
    },
    {
        "symbol": "BSCC",
        "annualized div": "0.03",
        "div yield": "0.1500%",
        "ex div date": "12/03/2012",
        "record date": "12/05/2012",
        "pay date": "12/07/2012",
        "next payout": "0.001"
    },
    {
        "symbol": "BSCD",
        "annualized div": "0.12",
        "div yield": "0.5800%",
        "ex div date": "11/01/2013",
        "record date": "11/05/2013",
        "pay date": "11/07/2013",
        "next payout": "0.002"
    },
    {
        "symbol": "BSCE",
        "annualized div": "0.01",
        "div yield": "0.0500%",
        "ex div date": "12/01/2014",
        "record date": "12/03/2014",
        "pay date": "12/05/2014",
        "next payout": "0.0003"
    },
    {
        "symbol": "BSCF",
        "annualized div": "0.138",
        "div yield": "0.6400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0115"
    },
    {
        "symbol": "BSCG",
        "annualized div": "0.228",
        "div yield": "1.0300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.019"
    },
    {
        "symbol": "BSCH",
        "annualized div": "0.3084",
        "div yield": "1.3500%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0257"
    },
    {
        "symbol": "BSD",
        "annualized div": "0.852",
        "div yield": "6.1900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.071"
    },
    {
        "symbol": "BSE",
        "annualized div": "0.72",
        "div yield": "5.3800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.06"
    },
    {
        "symbol": "BSJC",
        "annualized div": "0.74",
        "div yield": "2.9100%",
        "ex div date": "12/03/2012",
        "record date": "12/05/2012",
        "pay date": "12/07/2012",
        "next payout": "0.028"
    },
    {
        "symbol": "BSJD",
        "annualized div": "0.66",
        "div yield": "2.5800%",
        "ex div date": "12/02/2013",
        "record date": "12/04/2013",
        "pay date": "12/06/2013",
        "next payout": "0.015"
    },
    {
        "symbol": "BSJE",
        "annualized div": "0.16",
        "div yield": "0.6100%",
        "ex div date": "12/01/2014",
        "record date": "12/03/2014",
        "pay date": "12/05/2014",
        "next payout": "0.0133"
    },
    {
        "symbol": "BSJF",
        "annualized div": "0.8856",
        "div yield": "3.3900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0738"
    },
    {
        "symbol": "BSL",
        "annualized div": "1.2",
        "div yield": "6.9400%",
        "ex div date": "04/21/2015",
        "record date": "04/23/2015",
        "pay date": "04/30/2015",
        "next payout": "0.09"
    },
    {
        "symbol": "BSP",
        "annualized div": "0.57",
        "div yield": "6.400%",
        "ex div date": "08/01/2014",
        "record date": "08/05/2014",
        "pay date": "08/20/2014",
        "next payout": "0.0475"
    },
    {
        "symbol": "BSV",
        "annualized div": "0.942",
        "div yield": "1.1700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.078499"
    },
    {
        "symbol": "BTA",
        "annualized div": "0.7",
        "div yield": "6.1200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.058"
    },
    {
        "symbol": "BTZ",
        "annualized div": "0.97",
        "div yield": "7.1900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0805"
    },
    {
        "symbol": "BWN",
        "annualized div": "0.8",
        "div yield": "13.9100%",
        "ex div date": "01/06/2012",
        "record date": "01/10/2012",
        "pay date": "01/17/2012",
        "next payout": "0.0666666"
    },
    {
        "symbol": "BWX",
        "annualized div": "0.25",
        "div yield": "0.4700%",
        "ex div date": "12/29/2014",
        "record date": "12/31/2014",
        "pay date": "01/07/2015",
        "next payout": "0.130292"
    },
    {
        "symbol": "BYM",
        "annualized div": "0.86",
        "div yield": "6.00%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0715"
    },
    {
        "symbol": "BZM",
        "annualized div": "0.654",
        "div yield": "4.3300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0545"
    },
    {
        "symbol": "CCA",
        "annualized div": "0.624",
        "div yield": "5.4200%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.052"
    },
    {
        "symbol": "CEV",
        "annualized div": "0.74",
        "div yield": "5.5400%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/19/2015",
        "next payout": "0.061337"
    },
    {
        "symbol": "CFD",
        "annualized div": "1.24",
        "div yield": "10.3700%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/01/2015",
        "next payout": "0.103"
    },
    {
        "symbol": "CFP",
        "annualized div": "3.4296",
        "div yield": "21.6400%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "04/30/2015",
        "next payout": "0.2858"
    },
    {
        "symbol": "CFT",
        "annualized div": "3.74",
        "div yield": "3.3800%",
        "ex div date": "06/02/2014",
        "record date": "06/04/2014",
        "pay date": "06/06/2014",
        "next payout": "0.306944"
    },
    {
        "symbol": "CGO",
        "annualized div": "1.2",
        "div yield": "8.8200%",
        "ex div date": "03/09/2015",
        "record date": "03/11/2015",
        "pay date": "03/16/2015",
        "next payout": "0.1"
    },
    {
        "symbol": "CHI",
        "annualized div": "1.14",
        "div yield": "8.7400%",
        "ex div date": "03/09/2015",
        "record date": "03/11/2015",
        "pay date": "03/16/2015",
        "next payout": "0.095"
    },
    {
        "symbol": "CHW",
        "annualized div": "0.84",
        "div yield": "9.5100%",
        "ex div date": "03/09/2015",
        "record date": "03/11/2015",
        "pay date": "03/16/2015",
        "next payout": "0.07"
    },
    {
        "symbol": "CHY",
        "annualized div": "1.2",
        "div yield": "8.4400%",
        "ex div date": "03/09/2015",
        "record date": "03/11/2015",
        "pay date": "03/16/2015",
        "next payout": "0.1"
    },
    {
        "symbol": "CIF",
        "annualized div": "0.204",
        "div yield": "7.4500%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.017"
    },
    {
        "symbol": "CIK",
        "annualized div": "0.264",
        "div yield": "8.1700%",
        "ex div date": "04/08/2015",
        "record date": "04/10/2015",
        "pay date": "04/16/2015",
        "next payout": "0.022"
    },
    {
        "symbol": "CIU",
        "annualized div": "2.6403",
        "div yield": "2.3900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.220029"
    },
    {
        "symbol": "CLM",
        "annualized div": "4.42",
        "div yield": "20.7500%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "04/30/2015",
        "next payout": "0.368"
    },
    {
        "symbol": "CLY",
        "annualized div": "2.481",
        "div yield": "3.9600%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.206754"
    },
    {
        "symbol": "CMF",
        "annualized div": "3.2106",
        "div yield": "2.7200%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.267551"
    },
    {
        "symbol": "CMK",
        "annualized div": "0.396",
        "div yield": "4.6600%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.032"
    },
    {
        "symbol": "CMU",
        "annualized div": "0.276",
        "div yield": "6.2400%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.023"
    },
    {
        "symbol": "CORP",
        "annualized div": "3",
        "div yield": "2.8800%",
        "ex div date": "03/31/2015",
        "record date": "04/02/2015",
        "pay date": "04/07/2015",
        "next payout": "0.25"
    },
    {
        "symbol": "COY",
        "annualized div": "0.59",
        "div yield": "8.3100%",
        "ex div date": "10/11/2013",
        "record date": "10/16/2013",
        "pay date": "10/31/2013",
        "next payout": "0.0495"
    },
    {
        "symbol": "CRF",
        "annualized div": "1.09",
        "div yield": "4.8100%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "04/30/2015",
        "next payout": "0.3319"
    },
    {
        "symbol": "CSJ",
        "annualized div": "1.1255",
        "div yield": "1.0700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.093788"
    },
    {
        "symbol": "CSP",
        "annualized div": "0.48",
        "div yield": "6.4900%",
        "ex div date": "09/03/2014",
        "record date": "09/05/2014",
        "pay date": "10/01/2014",
        "next payout": "0.0407"
    },
    {
        "symbol": "CSQ",
        "annualized div": "0.99",
        "div yield": "8.7800%",
        "ex div date": "03/09/2015",
        "record date": "03/11/2015",
        "pay date": "03/16/2015",
        "next payout": "0.0825"
    },
    {
        "symbol": "CWB",
        "annualized div": "1.0406",
        "div yield": "2.1600%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.086719"
    },
    {
        "symbol": "CXA",
        "annualized div": "0.6146",
        "div yield": "2.5500%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.051215"
    },
    {
        "symbol": "CXE",
        "annualized div": "0.32",
        "div yield": "6.600%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.026"
    },
    {
        "symbol": "CXH",
        "annualized div": "0.504",
        "div yield": "5.3600%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.042"
    },
    {
        "symbol": "CYE",
        "annualized div": "0.61",
        "div yield": "8.3400%",
        "ex div date": "10/11/2013",
        "record date": "10/16/2013",
        "pay date": "10/31/2013",
        "next payout": "0.0505"
    },
    {
        "symbol": "DES",
        "annualized div": "2.3862",
        "div yield": "3.300%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.19885"
    },
    {
        "symbol": "DEX",
        "annualized div": "1.23",
        "div yield": "10.7300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/27/2015",
        "next payout": "0.075"
    },
    {
        "symbol": "DHF",
        "annualized div": "0.38",
        "div yield": "10.500%",
        "ex div date": "04/08/2015",
        "record date": "04/10/2015",
        "pay date": "04/27/2015",
        "next payout": "0.029"
    },
    {
        "symbol": "DHG",
        "annualized div": "1.02",
        "div yield": "7.1300%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.085"
    },
    {
        "symbol": "DHS",
        "annualized div": "1.6385",
        "div yield": "2.6800%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.13654"
    },
    {
        "symbol": "DIA",
        "annualized div": "3.7338",
        "div yield": "2.0800%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "04/13/2015",
        "next payout": "0.31115"
    },
    {
        "symbol": "DLN",
        "annualized div": "2.0507",
        "div yield": "2.7700%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.17089"
    },
    {
        "symbol": "DON",
        "annualized div": "1.6756",
        "div yield": "1.9400%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.13963"
    },
    {
        "symbol": "DSU",
        "annualized div": "0.29",
        "div yield": "7.7700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.024"
    },
    {
        "symbol": "DTD",
        "annualized div": "1.834",
        "div yield": "2.4500%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.15283"
    },
    {
        "symbol": "DTN",
        "annualized div": "2.1254",
        "div yield": "2.7800%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.17712"
    },
    {
        "symbol": "DUC",
        "annualized div": "0.6",
        "div yield": "6.1700%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "04/30/2015",
        "next payout": "0.05"
    },
    {
        "symbol": "EAD",
        "annualized div": "0.82",
        "div yield": "9.2800%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "05/01/2015",
        "next payout": "0.068"
    },
    {
        "symbol": "EFR",
        "annualized div": "0.94",
        "div yield": "6.5100%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.078"
    },
    {
        "symbol": "EFT",
        "annualized div": "0.9",
        "div yield": "6.1700%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.075"
    },
    {
        "symbol": "EGAS",
        "annualized div": "1.62",
        "div yield": "16.200%",
        "ex div date": "03/24/2015",
        "record date": "03/26/2015",
        "pay date": "04/02/2015",
        "next payout": "0.135"
    },
    {
        "symbol": "EGF",
        "annualized div": "0.66",
        "div yield": "4.7600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.055"
    },
    {
        "symbol": "EHI",
        "annualized div": "1.155",
        "div yield": "10.4100%",
        "ex div date": "04/15/2015",
        "record date": "04/17/2015",
        "pay date": "04/24/2015",
        "next payout": "0.09625"
    },
    {
        "symbol": "EIA",
        "annualized div": "0.73",
        "div yield": "5.6300%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.060916"
    },
    {
        "symbol": "EIO",
        "annualized div": "0.7",
        "div yield": "5.3500%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0585"
    },
    {
        "symbol": "EIP",
        "annualized div": "0.77",
        "div yield": "5.900%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.064417"
    },
    {
        "symbol": "ELD",
        "annualized div": "1.92",
        "div yield": "4.8500%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.16"
    },
    {
        "symbol": "EMB",
        "annualized div": "4.2755",
        "div yield": "3.8100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.356292"
    },
    {
        "symbol": "EMI",
        "annualized div": "0.71",
        "div yield": "5.4700%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/19/2015",
        "next payout": "0.059084"
    },
    {
        "symbol": "EMJ",
        "annualized div": "0.7",
        "div yield": "5.3400%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0625"
    },
    {
        "symbol": "EMLC",
        "annualized div": "1.176",
        "div yield": "5.8600%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.098"
    },
    {
        "symbol": "EOS",
        "annualized div": "1.1064",
        "div yield": "7.7500%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0875"
    },
    {
        "symbol": "EOT",
        "annualized div": "1.03",
        "div yield": "4.8600%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.085834"
    },
    {
        "symbol": "EPU",
        "annualized div": "0.53",
        "div yield": "1.8600%",
        "ex div date": "12/26/2014",
        "record date": "12/30/2014",
        "pay date": "01/02/2015",
        "next payout": "0.105633"
    },
    {
        "symbol": "ETO",
        "annualized div": "2.16",
        "div yield": "8.7300%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.18"
    },
    {
        "symbol": "ETV",
        "annualized div": "1.33",
        "div yield": "8.9300%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.1108"
    },
    {
        "symbol": "ETY",
        "annualized div": "1.01",
        "div yield": "8.8700%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0843"
    },
    {
        "symbol": "EVF",
        "annualized div": "0.4",
        "div yield": "6.1400%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/19/2015",
        "next payout": "0.033"
    },
    {
        "symbol": "EVN",
        "annualized div": "0.9",
        "div yield": "6.6100%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/19/2015",
        "next payout": "0.074999"
    },
    {
        "symbol": "EVO",
        "annualized div": "0.73",
        "div yield": "5.2700%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/19/2015",
        "next payout": "0.060919"
    },
    {
        "symbol": "EVP",
        "annualized div": "0.78",
        "div yield": "6.3800%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/19/2015",
        "next payout": "0.060583"
    },
    {
        "symbol": "EVT",
        "annualized div": "1.39",
        "div yield": "6.7400%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.1158"
    },
    {
        "symbol": "EVV",
        "annualized div": "1.22",
        "div yield": "8.5200%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/19/2015",
        "next payout": "0.1017"
    },
    {
        "symbol": "EVY",
        "annualized div": "0.82",
        "div yield": "5.9800%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/19/2015",
        "next payout": "0.068334"
    },
    {
        "symbol": "EXG",
        "annualized div": "0.98",
        "div yield": "10.0700%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0813"
    },
    {
        "symbol": "FAM",
        "annualized div": "1.08",
        "div yield": "9.2600%",
        "ex div date": "04/01/2015",
        "record date": "04/06/2015",
        "pay date": "04/15/2015",
        "next payout": "0.09"
    },
    {
        "symbol": "FBIZ",
        "annualized div": "0.88",
        "div yield": "1.9800%",
        "ex div date": "02/11/2015",
        "record date": "02/13/2015",
        "pay date": "02/27/2015",
        "next payout": "0.22"
    },
    {
        "symbol": "FCT",
        "annualized div": "0.82",
        "div yield": "5.9400%",
        "ex div date": "04/01/2015",
        "record date": "04/06/2015",
        "pay date": "04/15/2015",
        "next payout": "0.072"
    },
    {
        "symbol": "FHY",
        "annualized div": "1.32",
        "div yield": "9.300%",
        "ex div date": "04/01/2015",
        "record date": "04/06/2015",
        "pay date": "04/15/2015",
        "next payout": "0.11"
    },
    {
        "symbol": "FIVZ",
        "annualized div": "1.068",
        "div yield": "1.3200%",
        "ex div date": "03/31/2015",
        "record date": "04/02/2015",
        "pay date": "04/07/2015",
        "next payout": "0.089"
    },
    {
        "symbol": "FMN",
        "annualized div": "0.91",
        "div yield": "6.1300%",
        "ex div date": "03/19/2015",
        "record date": "03/23/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0735"
    },
    {
        "symbol": "FMY",
        "annualized div": "1.02",
        "div yield": "6.8100%",
        "ex div date": "04/01/2015",
        "record date": "04/06/2015",
        "pay date": "04/15/2015",
        "next payout": "0.085"
    },
    {
        "symbol": "FPT",
        "annualized div": "0.73",
        "div yield": "5.6500%",
        "ex div date": "03/19/2015",
        "record date": "03/23/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0555"
    },
    {
        "symbol": "FRA",
        "annualized div": "0.81",
        "div yield": "5.8100%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0674"
    },
    {
        "symbol": "FSD",
        "annualized div": "1.28",
        "div yield": "7.800%",
        "ex div date": "04/01/2015",
        "record date": "04/06/2015",
        "pay date": "04/15/2015",
        "next payout": "0.1065"
    },
    {
        "symbol": "FT",
        "annualized div": "0.47",
        "div yield": "6.5700%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/15/2015",
        "next payout": "0.0395"
    },
    {
        "symbol": "FTF",
        "annualized div": "0.74",
        "div yield": "6.0600%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/15/2015",
        "next payout": "0.062"
    },
    {
        "symbol": "FTT",
        "annualized div": "0.348",
        "div yield": "2.6200%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.029"
    },
    {
        "symbol": "FULL",
        "annualized div": "0.8",
        "div yield": "22.5400%",
        "ex div date": "04/28/2015",
        "record date": "04/30/2015",
        "pay date": "05/15/2015",
        "next payout": "0.035"
    },
    {
        "symbol": "FXA",
        "annualized div": "1.0537",
        "div yield": "1.3800%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/09/2015",
        "next payout": "0.08781"
    },
    {
        "symbol": "FXC",
        "annualized div": "0.0059",
        "div yield": "0.0100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/09/2015",
        "next payout": "0.00049"
    },
    {
        "symbol": "FXS",
        "annualized div": "0.38",
        "div yield": "0.3300%",
        "ex div date": "07/01/2014",
        "record date": "07/03/2014",
        "pay date": "07/09/2014",
        "next payout": "0.00749"
    },
    {
        "symbol": "GBAB",
        "annualized div": "1.66",
        "div yield": "7.3700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.13817"
    },
    {
        "symbol": "GBF",
        "annualized div": "1.9871",
        "div yield": "1.7200%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.16559"
    },
    {
        "symbol": "GDO",
        "annualized div": "1.44",
        "div yield": "8.0500%",
        "ex div date": "04/15/2015",
        "record date": "04/17/2015",
        "pay date": "04/24/2015",
        "next payout": "0.1135"
    },
    {
        "symbol": "GDV",
        "annualized div": "1.08",
        "div yield": "5.0900%",
        "ex div date": "04/14/2015",
        "record date": "04/16/2015",
        "pay date": "04/23/2015",
        "next payout": "0.1"
    },
    {
        "symbol": "ISTB",
        "annualized div": "1.4542",
        "div yield": "1.4400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.12118"
    },
    {
        "symbol": "GRP-U",
        "annualized div": "2.2",
        "div yield": "5.6400%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/15/2015",
        "next payout": "0.192"
    },
    {
        "symbol": "GGN",
        "annualized div": "1.08",
        "div yield": "15.4100%",
        "ex div date": "04/14/2015",
        "record date": "04/16/2015",
        "pay date": "04/23/2015",
        "next payout": "0.07"
    },
    {
        "symbol": "SLVO",
        "annualized div": "1.7112",
        "div yield": "14.8500%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/25/2015",
        "next payout": "0.1426"
    },
    {
        "symbol": "GHI",
        "annualized div": "0.6036",
        "div yield": "6.8600%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0503"
    },
    {
        "symbol": "GIM",
        "annualized div": "0.3",
        "div yield": "4.1300%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.025"
    },
    {
        "symbol": "GJI",
        "annualized div": "0.76",
        "div yield": "3.0400%",
        "ex div date": "11/26/2012",
        "record date": "11/28/2012",
        "pay date": "11/29/2012",
        "next payout": "0.0635246"
    },
    {
        "symbol": "GJJ",
        "annualized div": "0.75",
        "div yield": "3.00%",
        "ex div date": "10/09/2013",
        "record date": "10/11/2013",
        "pay date": "10/15/2013",
        "next payout": "0.0616438"
    },
    {
        "symbol": "GJO",
        "annualized div": "0.1895",
        "div yield": "0.9600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/16/2015",
        "next payout": "0.0157938"
    },
    {
        "symbol": "GJP",
        "annualized div": "0.6904",
        "div yield": "3.100%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/16/2015",
        "next payout": "0.0575343"
    },
    {
        "symbol": "GJR",
        "annualized div": "0.1651",
        "div yield": "0.8300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/16/2015",
        "next payout": "0.0137603"
    },
    {
        "symbol": "GJS",
        "annualized div": "0.2288",
        "div yield": "1.2500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/16/2015",
        "next payout": "0.0190625"
    },
    {
        "symbol": "GJT",
        "annualized div": "0.21",
        "div yield": "1.1800%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0170833"
    },
    {
        "symbol": "GMMB",
        "annualized div": "1.6141",
        "div yield": "3.0100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.13451"
    },
    {
        "symbol": "GMTB",
        "annualized div": "0.7478",
        "div yield": "1.4200%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.06232"
    },
    {
        "symbol": "GOF",
        "annualized div": "2.19",
        "div yield": "10.2500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.1821"
    },
    {
        "symbol": "GORO",
        "annualized div": "0.12",
        "div yield": "3.6800%",
        "ex div date": "04/09/2015",
        "record date": "04/13/2015",
        "pay date": "04/23/2015",
        "next payout": "0.01"
    },
    {
        "symbol": "GUT",
        "annualized div": "0.6",
        "div yield": "8.4300%",
        "ex div date": "04/14/2015",
        "record date": "04/16/2015",
        "pay date": "04/23/2015",
        "next payout": "0.05"
    },
    {
        "symbol": "GVI",
        "annualized div": "1.8136",
        "div yield": "1.6200%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.15113"
    },
    {
        "symbol": "HAV",
        "annualized div": "0.87",
        "div yield": "9.800%",
        "ex div date": "07/22/2014",
        "record date": "07/24/2014",
        "pay date": "07/31/2014",
        "next payout": "0.0725"
    },
    {
        "symbol": "HIF",
        "annualized div": "0.48",
        "div yield": "5.4900%",
        "ex div date": "06/11/2013",
        "record date": "06/13/2013",
        "pay date": "06/18/2013",
        "next payout": "0.04"
    },
    {
        "symbol": "HIH",
        "annualized div": "0.78",
        "div yield": "9.2900%",
        "ex div date": "07/22/2014",
        "record date": "07/24/2014",
        "pay date": "07/31/2014",
        "next payout": "0.065"
    },
    {
        "symbol": "HIS",
        "annualized div": "0.17",
        "div yield": "8.1300%",
        "ex div date": "10/11/2013",
        "record date": "10/16/2013",
        "pay date": "10/31/2013",
        "next payout": "0.0142"
    },
    {
        "symbol": "HIX",
        "annualized div": "0.99",
        "div yield": "12.300%",
        "ex div date": "04/15/2015",
        "record date": "04/17/2015",
        "pay date": "04/24/2015",
        "next payout": "0.069"
    },
    {
        "symbol": "HMH",
        "annualized div": "0.63",
        "div yield": "10.4300%",
        "ex div date": "07/22/2014",
        "record date": "07/24/2014",
        "pay date": "07/31/2014",
        "next payout": "0.0525"
    },
    {
        "symbol": "HSA",
        "annualized div": "0.6",
        "div yield": "9.100%",
        "ex div date": "07/22/2014",
        "record date": "07/24/2014",
        "pay date": "07/31/2014",
        "next payout": "0.05"
    },
    {
        "symbol": "HTD",
        "annualized div": "1.45",
        "div yield": "6.8200%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/31/2015",
        "next payout": "0.121"
    },
    {
        "symbol": "HTR",
        "annualized div": "2.28",
        "div yield": "9.400%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/26/2015",
        "next payout": "0.19"
    },
    {
        "symbol": "HYD",
        "annualized div": "1.506",
        "div yield": "4.8100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.1255"
    },
    {
        "symbol": "HYF",
        "annualized div": "0.18",
        "div yield": "9.5200%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0135"
    },
    {
        "symbol": "HYG",
        "annualized div": "4.7183",
        "div yield": "5.200%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.393188"
    },
    {
        "symbol": "HYLD",
        "annualized div": "3.5642",
        "div yield": "8.5800%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.29702"
    },
    {
        "symbol": "HYT",
        "annualized div": "0.84",
        "div yield": "7.5100%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.07"
    },
    {
        "symbol": "HYV",
        "annualized div": "1.03",
        "div yield": "8.3900%",
        "ex div date": "10/11/2013",
        "record date": "10/16/2013",
        "pay date": "10/31/2013",
        "next payout": "0.0855"
    },
    {
        "symbol": "ICB",
        "annualized div": "0.54",
        "div yield": "3.00%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/27/2015",
        "next payout": "0.045"
    },
    {
        "symbol": "IEF",
        "annualized div": "2.0408",
        "div yield": "1.8900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.170064"
    },
    {
        "symbol": "IEI",
        "annualized div": "1.5507",
        "div yield": "1.2500%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.129225"
    },
    {
        "symbol": "IGD",
        "annualized div": "0.91",
        "div yield": "10.8700%",
        "ex div date": "04/01/2015",
        "record date": "04/06/2015",
        "pay date": "04/15/2015",
        "next payout": "0.076"
    },
    {
        "symbol": "IGI",
        "annualized div": "1.2",
        "div yield": "5.6600%",
        "ex div date": "04/15/2015",
        "record date": "04/17/2015",
        "pay date": "04/24/2015",
        "next payout": "0.1"
    },
    {
        "symbol": "IGOV",
        "annualized div": "0.12",
        "div yield": "0.1300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.01001"
    },
    {
        "symbol": "IHE",
        "annualized div": "1.0216",
        "div yield": "0.5800%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.255405"
    },
    {
        "symbol": "IID",
        "annualized div": "0.83",
        "div yield": "10.3200%",
        "ex div date": "04/01/2015",
        "record date": "04/06/2015",
        "pay date": "04/15/2015",
        "next payout": "0.069"
    },
    {
        "symbol": "IIM",
        "annualized div": "0.84",
        "div yield": "5.2700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.07"
    },
    {
        "symbol": "IMT",
        "annualized div": "0.95",
        "div yield": "6.1800%",
        "ex div date": "10/10/2012",
        "record date": "10/12/2012",
        "pay date": "10/31/2012",
        "next payout": "0.1242"
    },
    {
        "symbol": "INY",
        "annualized div": "0.5924",
        "div yield": "2.5100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.049368"
    },
    {
        "symbol": "IQI",
        "annualized div": "0.78",
        "div yield": "6.2300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.065"
    },
    {
        "symbol": "IQT",
        "annualized div": "1.05",
        "div yield": "7.0700%",
        "ex div date": "10/10/2012",
        "record date": "10/12/2012",
        "pay date": "10/31/2012",
        "next payout": "0.24189"
    },
    {
        "symbol": "ISHG",
        "annualized div": "0.25",
        "div yield": "0.3200%",
        "ex div date": "12/01/2014",
        "record date": "12/03/2014",
        "pay date": "12/05/2014",
        "next payout": "0.0101"
    },
    {
        "symbol": "ISM",
        "annualized div": "0.715",
        "div yield": "2.9600%",
        "ex div date": "04/10/2015",
        "record date": "04/14/2015",
        "pay date": "04/15/2015",
        "next payout": "0.0595795"
    },
    {
        "symbol": "ITE",
        "annualized div": "0.6464",
        "div yield": "1.0700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.053865"
    },
    {
        "symbol": "ITM",
        "annualized div": "0.5076",
        "div yield": "2.1300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0423"
    },
    {
        "symbol": "ITR",
        "annualized div": "0.9302",
        "div yield": "2.700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.077513"
    },
    {
        "symbol": "JEM",
        "annualized div": "1.086",
        "div yield": "3.3200%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/20/2015",
        "next payout": "0.0966"
    },
    {
        "symbol": "JFR",
        "annualized div": "0.72",
        "div yield": "6.3400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.06"
    },
    {
        "symbol": "JLS",
        "annualized div": "1.52",
        "div yield": "6.5200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.1265"
    },
    {
        "symbol": "JMT",
        "annualized div": "1.53",
        "div yield": "6.7500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.1275"
    },
    {
        "symbol": "JNK",
        "annualized div": "2.2647",
        "div yield": "5.7700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.188728"
    },
    {
        "symbol": "TSLF",
        "annualized div": "1.43",
        "div yield": "7.7100%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.119"
    },
    {
        "symbol": "KYN-F",
        "annualized div": "0.88",
        "div yield": "3.4900%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "05/01/2015",
        "next payout": "0.072917"
    },
    {
        "symbol": "JQC",
        "annualized div": "0.58",
        "div yield": "6.3700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0485"
    },
    {
        "symbol": "JRO",
        "annualized div": "0.76",
        "div yield": "6.5400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.063"
    },
    {
        "symbol": "JTP",
        "annualized div": "0.66",
        "div yield": "7.7200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.055"
    },
    {
        "symbol": "ICOL",
        "annualized div": "0.3",
        "div yield": "2.0100%",
        "ex div date": "02/03/2015",
        "record date": "02/05/2015",
        "pay date": "02/09/2015",
        "next payout": "0.012517"
    },
    {
        "symbol": "CEFL",
        "annualized div": "4.08",
        "div yield": "18.3500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/23/2015",
        "next payout": "0.3404"
    },
    {
        "symbol": "OAKS-A",
        "annualized div": "2.47",
        "div yield": "9.6900%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "04/27/2015",
        "next payout": "0.1823"
    },
    {
        "symbol": "KBWD",
        "annualized div": "2.0056",
        "div yield": "7.8700%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.16713"
    },
    {
        "symbol": "KBWY",
        "annualized div": "1.7142",
        "div yield": "4.7400%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.14285"
    },
    {
        "symbol": "KHI",
        "annualized div": "0.72",
        "div yield": "8.1400%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.06"
    },
    {
        "symbol": "KMM",
        "annualized div": "0.66",
        "div yield": "7.7600%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.055"
    },
    {
        "symbol": "KSM",
        "annualized div": "0.77",
        "div yield": "5.5800%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.077"
    },
    {
        "symbol": "KST",
        "annualized div": "0.93",
        "div yield": "7.9400%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0775"
    },
    {
        "symbol": "KTF",
        "annualized div": "0.84",
        "div yield": "6.0900%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.07"
    },
    {
        "symbol": "LAG",
        "annualized div": "1.4391",
        "div yield": "2.4400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.119925"
    },
    {
        "symbol": "LBF",
        "annualized div": "0.57",
        "div yield": "6.8300%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.045"
    },
    {
        "symbol": "LEO",
        "annualized div": "0.52",
        "div yield": "6.300%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "04/30/2015",
        "next payout": "0.043"
    },
    {
        "symbol": "LGI",
        "annualized div": "1.1138",
        "div yield": "6.8300%",
        "ex div date": "04/08/2015",
        "record date": "04/10/2015",
        "pay date": "04/23/2015",
        "next payout": "0.09282"
    },
    {
        "symbol": "LOR",
        "annualized div": "1.03",
        "div yield": "8.1600%",
        "ex div date": "04/08/2015",
        "record date": "04/10/2015",
        "pay date": "04/23/2015",
        "next payout": "0.07649"
    },
    {
        "symbol": "LQD",
        "annualized div": "3.9288",
        "div yield": "3.2300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.327402"
    },
    {
        "symbol": "LTPZ",
        "annualized div": "0.24",
        "div yield": "0.3500%",
        "ex div date": "12/29/2014",
        "record date": "12/31/2014",
        "pay date": "01/05/2015",
        "next payout": "0.04"
    },
    {
        "symbol": "LWC",
        "annualized div": "1.7524",
        "div yield": "4.1400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.146035"
    },
    {
        "symbol": "MAB",
        "annualized div": "0.76",
        "div yield": "5.2400%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.063333"
    },
    {
        "symbol": "MAV",
        "annualized div": "1.14",
        "div yield": "7.4300%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.095"
    },
    {
        "symbol": "MBG",
        "annualized div": "0.7377",
        "div yield": "2.6900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.061477"
    },
    {
        "symbol": "MCA",
        "annualized div": "0.88",
        "div yield": "5.6500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.073"
    },
    {
        "symbol": "MCR",
        "annualized div": "0.54",
        "div yield": "6.0800%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.045"
    },
    {
        "symbol": "MEN",
        "annualized div": "0.01",
        "div yield": "0.0900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0605"
    },
    {
        "symbol": "MFG",
        "annualized div": "0.06",
        "div yield": "1.6500%",
        "ex div date": "TBA",
        "record date": "03/30/2010",
        "pay date": "07/02/2010",
        "next payout": "0.175727"
    },
    {
        "symbol": "MFL",
        "annualized div": "0.858",
        "div yield": "5.9500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0715"
    },
    {
        "symbol": "MFM",
        "annualized div": "0.396",
        "div yield": "5.9100%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.033"
    },
    {
        "symbol": "MFV",
        "annualized div": "0.6664",
        "div yield": "10.0800%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.05553"
    },
    {
        "symbol": "MGF",
        "annualized div": "0.4374",
        "div yield": "7.8200%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.03645"
    },
    {
        "symbol": "MHD",
        "annualized div": "1.14",
        "div yield": "6.5800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0885"
    },
    {
        "symbol": "MHI",
        "annualized div": "1.02",
        "div yield": "7.0900%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.085"
    },
    {
        "symbol": "MHN",
        "annualized div": "0.83",
        "div yield": "5.9500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.069"
    },
    {
        "symbol": "MIN",
        "annualized div": "0.4553",
        "div yield": "9.3300%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.03794"
    },
    {
        "symbol": "MINT",
        "annualized div": "0.672",
        "div yield": "0.6600%",
        "ex div date": "03/31/2015",
        "record date": "04/02/2015",
        "pay date": "04/07/2015",
        "next payout": "0.056"
    },
    {
        "symbol": "MIW",
        "annualized div": "0.73",
        "div yield": "5.4300%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.065749"
    },
    {
        "symbol": "MIY",
        "annualized div": "0.86",
        "div yield": "6.1300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.072"
    },
    {
        "symbol": "MJI",
        "annualized div": "0.89",
        "div yield": "6.1200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.074"
    },
    {
        "symbol": "MLN",
        "annualized div": "0.6228",
        "div yield": "3.1400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0519"
    },
    {
        "symbol": "MMT",
        "annualized div": "0.06",
        "div yield": "0.9400%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.032"
    },
    {
        "symbol": "MMV",
        "annualized div": "0.74",
        "div yield": "5.3700%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/19/2015",
        "next payout": "0.057166"
    },
    {
        "symbol": "MNE",
        "annualized div": "0.69",
        "div yield": "4.9600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0575"
    },
    {
        "symbol": "MNP",
        "annualized div": "0.88",
        "div yield": "5.6700%",
        "ex div date": "04/15/2015",
        "record date": "04/17/2015",
        "pay date": "04/24/2015",
        "next payout": "0.0725"
    },
    {
        "symbol": "MPA",
        "annualized div": "0.858",
        "div yield": "5.9300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0715"
    },
    {
        "symbol": "MQT",
        "annualized div": "0.85",
        "div yield": "6.3900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0705"
    },
    {
        "symbol": "MQY",
        "annualized div": "0.96",
        "div yield": "6.2900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.08"
    },
    {
        "symbol": "MRF",
        "annualized div": "0.48",
        "div yield": "6.3200%",
        "ex div date": "09/02/2014",
        "record date": "09/04/2014",
        "pay date": "09/17/2014",
        "next payout": "0.04"
    },
    {
        "symbol": "MUAB",
        "annualized div": "0",
        "div yield": "0%",
        "ex div date": "07/01/2013",
        "record date": "07/03/2013",
        "pay date": "07/08/2013",
        "next payout": "0.020056"
    },
    {
        "symbol": "MUAC",
        "annualized div": "0.32",
        "div yield": "0.6300%",
        "ex div date": "07/01/2014",
        "record date": "07/03/2014",
        "pay date": "07/08/2014",
        "next payout": "0.016719"
    },
    {
        "symbol": "MUAD",
        "annualized div": "0.44",
        "div yield": "0.8300%",
        "ex div date": "07/01/2014",
        "record date": "07/03/2014",
        "pay date": "07/08/2014",
        "next payout": "0.027497"
    },
    {
        "symbol": "MUAE",
        "annualized div": "0.53",
        "div yield": "0.9900%",
        "ex div date": "07/01/2014",
        "record date": "07/03/2014",
        "pay date": "07/08/2014",
        "next payout": "0.032411"
    },
    {
        "symbol": "MUAF",
        "annualized div": "0.68",
        "div yield": "1.2300%",
        "ex div date": "07/01/2014",
        "record date": "07/03/2014",
        "pay date": "07/08/2014",
        "next payout": "0.045548"
    },
    {
        "symbol": "MUB",
        "annualized div": "2.8847",
        "div yield": "2.6100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.240388"
    },
    {
        "symbol": "MUC",
        "annualized div": "0.81",
        "div yield": "5.5200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0675"
    },
    {
        "symbol": "MUE",
        "annualized div": "0.816",
        "div yield": "5.9600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.068"
    },
    {
        "symbol": "MUH",
        "annualized div": "1",
        "div yield": "6.5300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0775"
    },
    {
        "symbol": "MUI",
        "annualized div": "0.786",
        "div yield": "5.3900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0655"
    },
    {
        "symbol": "MUJ",
        "annualized div": "0.89",
        "div yield": "6.0300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.074"
    },
    {
        "symbol": "MUNI",
        "annualized div": "1.2",
        "div yield": "2.2300%",
        "ex div date": "03/31/2015",
        "record date": "04/02/2015",
        "pay date": "04/07/2015",
        "next payout": "0.1"
    },
    {
        "symbol": "MUS",
        "annualized div": "0.81",
        "div yield": "6.0400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0675"
    },
    {
        "symbol": "MVF",
        "annualized div": "0.642",
        "div yield": "6.2800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0535"
    },
    {
        "symbol": "MVT",
        "annualized div": "0.17",
        "div yield": "1.0500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.083"
    },
    {
        "symbol": "MXA",
        "annualized div": "1.33",
        "div yield": "8.400%",
        "ex div date": "10/01/2014",
        "record date": "10/03/2014",
        "pay date": "10/22/2014",
        "next payout": "0.111"
    },
    {
        "symbol": "MXN",
        "annualized div": "1.03",
        "div yield": "7.0800%",
        "ex div date": "10/01/2014",
        "record date": "10/03/2014",
        "pay date": "10/22/2014",
        "next payout": "0.0861"
    },
    {
        "symbol": "MYC",
        "annualized div": "0.876",
        "div yield": "5.6200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.073"
    },
    {
        "symbol": "MYD",
        "annualized div": "0.02",
        "div yield": "0.1300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.077"
    },
    {
        "symbol": "MYF",
        "annualized div": "0.978",
        "div yield": "6.3400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0815"
    },
    {
        "symbol": "MYI",
        "annualized div": "0.888",
        "div yield": "6.2900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.074"
    },
    {
        "symbol": "MYJ",
        "annualized div": "0.9",
        "div yield": "5.9300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.075"
    },
    {
        "symbol": "MYM",
        "annualized div": "0.79",
        "div yield": "6.0900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.066"
    },
    {
        "symbol": "MYN",
        "annualized div": "0.77",
        "div yield": "5.800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0645"
    },
    {
        "symbol": "MZA",
        "annualized div": "0.83",
        "div yield": "5.0900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0695"
    },
    {
        "symbol": "MZF",
        "annualized div": "0.7392",
        "div yield": "5.4600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0616"
    },
    {
        "symbol": "NAC",
        "annualized div": "0.96",
        "div yield": "6.3100%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.08"
    },
    {
        "symbol": "NAD",
        "annualized div": "0.888",
        "div yield": "6.2500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.074"
    },
    {
        "symbol": "NAN",
        "annualized div": "0.78",
        "div yield": "5.6300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.065"
    },
    {
        "symbol": "NBB",
        "annualized div": "1.39",
        "div yield": "6.5400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.116"
    },
    {
        "symbol": "NBD",
        "annualized div": "1.37",
        "div yield": "6.300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.114"
    },
    {
        "symbol": "NBJ",
        "annualized div": "1.29",
        "div yield": "8.1300%",
        "ex div date": "04/03/2013",
        "record date": "04/05/2013",
        "pay date": "05/01/2013",
        "next payout": "0.1074"
    },
    {
        "symbol": "NCA",
        "annualized div": "0.47",
        "div yield": "4.4300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.039"
    },
    {
        "symbol": "NCB",
        "annualized div": "0.78",
        "div yield": "4.7100%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.065"
    },
    {
        "symbol": "NCP",
        "annualized div": "0.95",
        "div yield": "6.6500%",
        "ex div date": "05/13/2014",
        "record date": "05/15/2014",
        "pay date": "06/02/2014",
        "next payout": "0.079"
    },
    {
        "symbol": "NCU",
        "annualized div": "0.84",
        "div yield": "6.0400%",
        "ex div date": "05/13/2014",
        "record date": "05/15/2014",
        "pay date": "06/02/2014",
        "next payout": "0.07"
    },
    {
        "symbol": "NEA",
        "annualized div": "0.82",
        "div yield": "5.9600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0685"
    },
    {
        "symbol": "NFZ",
        "annualized div": "0.89",
        "div yield": "5.9400%",
        "ex div date": "04/03/2013",
        "record date": "04/05/2013",
        "pay date": "05/01/2013",
        "next payout": "0.0738"
    },
    {
        "symbol": "NGX",
        "annualized div": "0.58",
        "div yield": "4.5600%",
        "ex div date": "05/13/2014",
        "record date": "05/15/2014",
        "pay date": "06/02/2014",
        "next payout": "0.048"
    },
    {
        "symbol": "NIF",
        "annualized div": "0.86",
        "div yield": "5.7300%",
        "ex div date": "05/01/2013",
        "record date": "05/03/2013",
        "pay date": "06/03/2013",
        "next payout": "0.072"
    },
    {
        "symbol": "NIM",
        "annualized div": "0.33",
        "div yield": "3.0700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0275"
    },
    {
        "symbol": "NJV",
        "annualized div": "0.6",
        "div yield": "4.0700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.05"
    },
    {
        "symbol": "NKG",
        "annualized div": "0.64",
        "div yield": "4.9800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0535"
    },
    {
        "symbol": "NKO",
        "annualized div": "0.77",
        "div yield": "5.1700%",
        "ex div date": "03/06/2013",
        "record date": "03/08/2013",
        "pay date": "04/01/2013",
        "next payout": "0.065"
    },
    {
        "symbol": "NKR",
        "annualized div": "0.81",
        "div yield": "5.3200%",
        "ex div date": "04/03/2013",
        "record date": "04/05/2013",
        "pay date": "05/01/2013",
        "next payout": "0.0671"
    },
    {
        "symbol": "NKX",
        "annualized div": "0.86",
        "div yield": "5.7800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.072"
    },
    {
        "symbol": "NMA",
        "annualized div": "0.792",
        "div yield": "5.7700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.066"
    },
    {
        "symbol": "NMB",
        "annualized div": "0.65",
        "div yield": "4.9400%",
        "ex div date": "05/13/2014",
        "record date": "05/15/2014",
        "pay date": "06/02/2014",
        "next payout": "0.054"
    },
    {
        "symbol": "NMD",
        "annualized div": "0.15",
        "div yield": "1.2700%",
        "ex div date": "07/10/2013",
        "record date": "07/12/2013",
        "pay date": "08/01/2013",
        "next payout": "0.0655"
    },
    {
        "symbol": "NMI",
        "annualized div": "0.54.",
        "div yield": "4.5500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0425"
    },
    {
        "symbol": "NMO",
        "annualized div": "0.77",
        "div yield": "5.6400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.067"
    },
    {
        "symbol": "NMP",
        "annualized div": "0.85",
        "div yield": "5.6100%",
        "ex div date": "01/02/2013",
        "record date": "01/04/2013",
        "pay date": "02/01/2013",
        "next payout": "0.2405"
    },
    {
        "symbol": "NMT",
        "annualized div": "0.708",
        "div yield": "5.3100%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.059"
    },
    {
        "symbol": "NMY",
        "annualized div": "0.67",
        "div yield": "5.2600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0555"
    },
    {
        "symbol": "NMZ",
        "annualized div": "0.88",
        "div yield": "6.3900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.076"
    },
    {
        "symbol": "NNC",
        "annualized div": "0.588",
        "div yield": "4.4800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.049"
    },
    {
        "symbol": "NNF",
        "annualized div": "2.72",
        "div yield": "18.00%",
        "ex div date": "03/06/2013",
        "record date": "03/08/2013",
        "pay date": "04/01/2013",
        "next payout": "0.0069"
    },
    {
        "symbol": "NNJ",
        "annualized div": "0.85",
        "div yield": "6.2100%",
        "ex div date": "10/10/2014",
        "record date": "10/15/2014",
        "pay date": "11/03/2014",
        "next payout": "0.068"
    },
    {
        "symbol": "NNP",
        "annualized div": "0.822",
        "div yield": "5.6100%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0685"
    },
    {
        "symbol": "NNY",
        "annualized div": "0.37",
        "div yield": "3.800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0325"
    },
    {
        "symbol": "NPF",
        "annualized div": "0.822",
        "div yield": "5.9400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0685"
    },
    {
        "symbol": "NPM",
        "annualized div": "0.86",
        "div yield": "6.1100%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.072"
    },
    {
        "symbol": "NPN",
        "annualized div": "0.62",
        "div yield": "4.00%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.052"
    },
    {
        "symbol": "NPP",
        "annualized div": "0.924",
        "div yield": "6.2700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.077"
    },
    {
        "symbol": "NPT",
        "annualized div": "0.82",
        "div yield": "6.200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.068"
    },
    {
        "symbol": "NPV",
        "annualized div": "0.73",
        "div yield": "5.4500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.061"
    },
    {
        "symbol": "NQC",
        "annualized div": "0.92",
        "div yield": "6.3300%",
        "ex div date": "05/13/2014",
        "record date": "05/15/2014",
        "pay date": "06/02/2014",
        "next payout": "0.077"
    },
    {
        "symbol": "NQI",
        "annualized div": "0.66",
        "div yield": "4.9500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.055"
    },
    {
        "symbol": "NQJ",
        "annualized div": "0.8",
        "div yield": "6.0200%",
        "ex div date": "10/10/2014",
        "record date": "10/15/2014",
        "pay date": "11/03/2014",
        "next payout": "0.064"
    },
    {
        "symbol": "NQN",
        "annualized div": "0.83",
        "div yield": "5.5400%",
        "ex div date": "03/06/2013",
        "record date": "03/08/2013",
        "pay date": "04/01/2013",
        "next payout": "0.0081"
    },
    {
        "symbol": "NQP",
        "annualized div": "0.88",
        "div yield": "6.3500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.069"
    },
    {
        "symbol": "NQS",
        "annualized div": "0.78",
        "div yield": "5.5600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0665"
    },
    {
        "symbol": "NQU",
        "annualized div": "0.79",
        "div yield": "5.6500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0685"
    },
    {
        "symbol": "NRK",
        "annualized div": "0.73",
        "div yield": "5.600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.061"
    },
    {
        "symbol": "NSL",
        "annualized div": "0.42",
        "div yield": "6.2800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.035"
    },
    {
        "symbol": "NTC",
        "annualized div": "0.68",
        "div yield": "5.3500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.057"
    },
    {
        "symbol": "NTX",
        "annualized div": "0.7",
        "div yield": "4.900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0545"
    },
    {
        "symbol": "NUC",
        "annualized div": "1.02",
        "div yield": "6.7400%",
        "ex div date": "05/13/2014",
        "record date": "05/15/2014",
        "pay date": "06/02/2014",
        "next payout": "0.085"
    },
    {
        "symbol": "NUJ",
        "annualized div": "0.71",
        "div yield": "5.3600%",
        "ex div date": "10/10/2014",
        "record date": "10/15/2014",
        "pay date": "11/03/2014",
        "next payout": "0.0595"
    },
    {
        "symbol": "NUN",
        "annualized div": "0.84",
        "div yield": "5.6100%",
        "ex div date": "03/06/2013",
        "record date": "03/08/2013",
        "pay date": "04/01/2013",
        "next payout": "0.0085"
    },
    {
        "symbol": "NUV",
        "annualized div": "0.43",
        "div yield": "4.3500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0345"
    },
    {
        "symbol": "NUW",
        "annualized div": "0.78",
        "div yield": "4.4800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.065"
    },
    {
        "symbol": "NVC",
        "annualized div": "1",
        "div yield": "6.7400%",
        "ex div date": "05/13/2014",
        "record date": "05/15/2014",
        "pay date": "06/02/2014",
        "next payout": "0.083"
    },
    {
        "symbol": "NVG",
        "annualized div": "0.73",
        "div yield": "5.0600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.061"
    },
    {
        "symbol": "NVJ",
        "annualized div": "1.15",
        "div yield": "7.100%",
        "ex div date": "04/03/2013",
        "record date": "04/05/2013",
        "pay date": "05/01/2013",
        "next payout": "0.0958"
    },
    {
        "symbol": "NVN",
        "annualized div": "0.87",
        "div yield": "5.6700%",
        "ex div date": "03/06/2013",
        "record date": "03/08/2013",
        "pay date": "04/01/2013",
        "next payout": "0.0155"
    },
    {
        "symbol": "NVX",
        "annualized div": "0.84",
        "div yield": "5.8500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.07"
    },
    {
        "symbol": "NVY",
        "annualized div": "0.74",
        "div yield": "5.900%",
        "ex div date": "01/13/2014",
        "record date": "01/15/2014",
        "pay date": "02/03/2014",
        "next payout": "0.0585"
    },
    {
        "symbol": "NXE",
        "annualized div": "0.83",
        "div yield": "5.6500%",
        "ex div date": "04/03/2013",
        "record date": "04/05/2013",
        "pay date": "05/01/2013",
        "next payout": "0.0695"
    },
    {
        "symbol": "NXI",
        "annualized div": "0.47",
        "div yield": "2.8900%",
        "ex div date": "04/03/2013",
        "record date": "04/05/2013",
        "pay date": "05/01/2013",
        "next payout": "0.0393"
    },
    {
        "symbol": "NXJ",
        "annualized div": "0.82",
        "div yield": "5.9900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.068"
    },
    {
        "symbol": "NXK",
        "annualized div": "0.696",
        "div yield": "5.1700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.058"
    },
    {
        "symbol": "NXM",
        "annualized div": "0.71",
        "div yield": "5.5900%",
        "ex div date": "01/13/2014",
        "record date": "01/15/2014",
        "pay date": "02/03/2014",
        "next payout": "0.0595"
    },
    {
        "symbol": "NXN",
        "annualized div": "0.59",
        "div yield": "4.2100%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.046"
    },
    {
        "symbol": "NXP",
        "annualized div": "0.57",
        "div yield": "3.9200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0475"
    },
    {
        "symbol": "NXR",
        "annualized div": "0.59",
        "div yield": "3.9900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.049"
    },
    {
        "symbol": "NXZ",
        "annualized div": "0.816",
        "div yield": "5.7700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.068"
    },
    {
        "symbol": "NYF",
        "annualized div": "3.0583",
        "div yield": "2.7300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.254857"
    },
    {
        "symbol": "NYV",
        "annualized div": "0.65",
        "div yield": "4.3900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0525"
    },
    {
        "symbol": "NZF",
        "annualized div": "0.768",
        "div yield": "5.4700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.064"
    },
    {
        "symbol": "NZH",
        "annualized div": "0.8",
        "div yield": "5.8800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.067"
    },
    {
        "symbol": "IBDA",
        "annualized div": "0.7219",
        "div yield": "0.7100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.060157"
    },
    {
        "symbol": "NZW",
        "annualized div": "0.73",
        "div yield": "4.8800%",
        "ex div date": "01/02/2013",
        "record date": "01/04/2013",
        "pay date": "02/01/2013",
        "next payout": "0.0903"
    },
    {
        "symbol": "NZW-C",
        "annualized div": "0.046",
        "div yield": "0.4600%",
        "ex div date": "01/02/2013",
        "record date": "01/04/2013",
        "pay date": "02/01/2013",
        "next payout": "0.003833"
    },
    {
        "symbol": "OIA",
        "annualized div": "0.41",
        "div yield": "5.8300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0328"
    },
    {
        "symbol": "OIC",
        "annualized div": "0.51",
        "div yield": "5.9200%",
        "ex div date": "08/22/2012",
        "record date": "08/24/2012",
        "pay date": "08/31/2012",
        "next payout": "0.048"
    },
    {
        "symbol": "OSM",
        "annualized div": "0.7022",
        "div yield": "2.8600%",
        "ex div date": "04/10/2015",
        "record date": "04/14/2015",
        "pay date": "04/15/2015",
        "next payout": "0.0585178"
    },
    {
        "symbol": "PCEF",
        "annualized div": "1.965",
        "div yield": "8.2300%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.16375"
    },
    {
        "symbol": "PCM",
        "annualized div": "0.96",
        "div yield": "9.0800%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "04/01/2015",
        "next payout": "0.08"
    },
    {
        "symbol": "PCN",
        "annualized div": "1.35",
        "div yield": "8.8600%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "04/01/2015",
        "next payout": "0.1125"
    },
    {
        "symbol": "PCY",
        "annualized div": "1.44",
        "div yield": "5.0600%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.12"
    },
    {
        "symbol": "PEY",
        "annualized div": "0.4642",
        "div yield": "3.4500%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.03868"
    },
    {
        "symbol": "PFD",
        "annualized div": "1.08",
        "div yield": "7.0300%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.09"
    },
    {
        "symbol": "PFF",
        "annualized div": "2.0383",
        "div yield": "5.0800%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.169857"
    },
    {
        "symbol": "PFK",
        "annualized div": "0.77",
        "div yield": "2.9300%",
        "ex div date": "03/30/2015",
        "record date": "04/01/2015",
        "pay date": "04/10/2015",
        "next payout": "0.0641667"
    },
    {
        "symbol": "PFL",
        "annualized div": "1.08",
        "div yield": "9.4500%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "04/01/2015",
        "next payout": "0.09"
    },
    {
        "symbol": "PFN",
        "annualized div": "0.96",
        "div yield": "9.5400%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "04/01/2015",
        "next payout": "0.08"
    },
    {
        "symbol": "PFO",
        "annualized div": "0.88",
        "div yield": "7.1400%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.073"
    },
    {
        "symbol": "PGD",
        "annualized div": "0.1836",
        "div yield": "0.3700%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/20/2015",
        "next payout": "0.0153"
    },
    {
        "symbol": "PGF",
        "annualized div": "1.0354",
        "div yield": "5.5800%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.08628"
    },
    {
        "symbol": "PGX",
        "annualized div": "0.8699",
        "div yield": "5.8400%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.07249"
    },
    {
        "symbol": "PHB",
        "annualized div": "0.832",
        "div yield": "4.3800%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.06933"
    },
    {
        "symbol": "PHD",
        "annualized div": "0.78",
        "div yield": "6.6600%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.055"
    },
    {
        "symbol": "PHF",
        "annualized div": "0.64",
        "div yield": "8.600%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.05"
    },
    {
        "symbol": "PHK",
        "annualized div": "1.46",
        "div yield": "11.6300%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "04/01/2015",
        "next payout": "0.121875"
    },
    {
        "symbol": "PHT",
        "annualized div": "1.38",
        "div yield": "10.7600%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.115"
    },
    {
        "symbol": "PIA",
        "annualized div": "1.07",
        "div yield": "11.3200%",
        "ex div date": "10/10/2012",
        "record date": "10/12/2012",
        "pay date": "10/31/2012",
        "next payout": "0.0896"
    },
    {
        "symbol": "PIC",
        "annualized div": "0.47",
        "div yield": "2.4700%",
        "ex div date": "12/21/2012",
        "record date": "12/26/2012",
        "pay date": "12/31/2012",
        "next payout": "0.11825"
    },
    {
        "symbol": "PICB",
        "annualized div": "0.624",
        "div yield": "2.3600%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.052"
    },
    {
        "symbol": "PIM",
        "annualized div": "0.348",
        "div yield": "7.1300%",
        "ex div date": "04/22/2015",
        "record date": "04/24/2015",
        "pay date": "05/01/2015",
        "next payout": "0.026"
    },
    {
        "symbol": "PLK",
        "annualized div": "0",
        "div yield": "0%",
        "ex div date": "01/15/2013",
        "record date": "01/17/2013",
        "pay date": "01/31/2013",
        "next payout": "0.00675"
    },
    {
        "symbol": "PLW",
        "annualized div": "0.7114",
        "div yield": "2.1200%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.05928"
    },
    {
        "symbol": "PMM",
        "annualized div": "0.44",
        "div yield": "6.0600%",
        "ex div date": "04/22/2015",
        "record date": "04/24/2015",
        "pay date": "05/01/2015",
        "next payout": "0.0363"
    },
    {
        "symbol": "PMX",
        "annualized div": "0.75",
        "div yield": "6.5700%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0623"
    },
    {
        "symbol": "PPR",
        "annualized div": "0.324",
        "div yield": "5.8400%",
        "ex div date": "03/06/2015",
        "record date": "03/10/2015",
        "pay date": "03/23/2015",
        "next payout": "0.027"
    },
    {
        "symbol": "PPT",
        "annualized div": "0.516",
        "div yield": "9.7500%",
        "ex div date": "04/22/2015",
        "record date": "04/24/2015",
        "pay date": "05/01/2015",
        "next payout": "0.026"
    },
    {
        "symbol": "PRB",
        "annualized div": "0.08",
        "div yield": "0.3300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.007"
    },
    {
        "symbol": "PSF",
        "annualized div": "2.064",
        "div yield": "7.7900%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.172"
    },
    {
        "symbol": "PTY",
        "annualized div": "1.56",
        "div yield": "9.9400%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "04/01/2015",
        "next payout": "0.13"
    },
    {
        "symbol": "PVI",
        "annualized div": "0.008",
        "div yield": "0.0300%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.00005"
    },
    {
        "symbol": "PWZ",
        "annualized div": "0.8772",
        "div yield": "3.400%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0731"
    },
    {
        "symbol": "PZA",
        "annualized div": "0.9242",
        "div yield": "3.6200%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.07702"
    },
    {
        "symbol": "PZT",
        "annualized div": "0.8456",
        "div yield": "3.4600%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.07047"
    },
    {
        "symbol": "RCS",
        "annualized div": "0.96",
        "div yield": "10.400%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "04/01/2015",
        "next payout": "0.08"
    },
    {
        "symbol": "RIT",
        "annualized div": "0.72",
        "div yield": "5.500%",
        "ex div date": "04/15/2015",
        "record date": "04/17/2015",
        "pay date": "04/24/2015",
        "next payout": "0.06"
    },
    {
        "symbol": "EMAG",
        "annualized div": "0.9",
        "div yield": "4.0800%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.075"
    },
    {
        "symbol": "SBW",
        "annualized div": "1.01",
        "div yield": "8.900%",
        "ex div date": "04/15/2015",
        "record date": "04/17/2015",
        "pay date": "04/24/2015",
        "next payout": "0.08"
    },
    {
        "symbol": "SCHO",
        "annualized div": "0.2832",
        "div yield": "0.5600%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0236"
    },
    {
        "symbol": "SCHR",
        "annualized div": "0.7824",
        "div yield": "1.4400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0652"
    },
    {
        "symbol": "SCPB",
        "annualized div": "0.4423",
        "div yield": "1.4400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.036858"
    },
    {
        "symbol": "SGL",
        "annualized div": "0.4932",
        "div yield": "5.7700%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0411"
    },
    {
        "symbol": "SHM",
        "annualized div": "0.2979",
        "div yield": "1.2300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.024823"
    },
    {
        "symbol": "SHY",
        "annualized div": "0.3724",
        "div yield": "0.4400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.031035"
    },
    {
        "symbol": "SLA",
        "annualized div": "0.69",
        "div yield": "6.4700%",
        "ex div date": "09/03/2014",
        "record date": "09/05/2014",
        "pay date": "10/01/2014",
        "next payout": "0.0476"
    },
    {
        "symbol": "SMB",
        "annualized div": "0.18",
        "div yield": "1.0300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.015"
    },
    {
        "symbol": "SMMU",
        "annualized div": "0.432",
        "div yield": "0.8600%",
        "ex div date": "03/31/2015",
        "record date": "04/02/2015",
        "pay date": "04/07/2015",
        "next payout": "0.036"
    },
    {
        "symbol": "SHYG",
        "annualized div": "2.0408",
        "div yield": "4.1600%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.170063"
    },
    {
        "symbol": "SLQD",
        "annualized div": "0.6628",
        "div yield": "1.3100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.055236"
    },
    {
        "symbol": "SUB",
        "annualized div": "0.8169",
        "div yield": "0.7700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.068074"
    },
    {
        "symbol": "TAI",
        "annualized div": "1.08",
        "div yield": "5.3100%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/15/2015",
        "next payout": "0.09"
    },
    {
        "symbol": "TDN",
        "annualized div": "0.52",
        "div yield": "1.7300%",
        "ex div date": "12/19/2014",
        "record date": "12/23/2014",
        "pay date": "12/26/2014",
        "next payout": "0.60121"
    },
    {
        "symbol": "TENZ",
        "annualized div": "1.92",
        "div yield": "2.200%",
        "ex div date": "03/31/2015",
        "record date": "04/02/2015",
        "pay date": "04/07/2015",
        "next payout": "0.16"
    },
    {
        "symbol": "TFI",
        "annualized div": "0.57",
        "div yield": "2.3500%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.050132"
    },
    {
        "symbol": "TGR",
        "annualized div": "0.76",
        "div yield": "2.2800%",
        "ex div date": "10/02/2014",
        "record date": "10/06/2014",
        "pay date": "10/08/2014",
        "next payout": "0.06318"
    },
    {
        "symbol": "TIPZ",
        "annualized div": "2.16",
        "div yield": "3.7500%",
        "ex div date": "08/29/2014",
        "record date": "09/03/2014",
        "pay date": "09/05/2014",
        "next payout": "0.08"
    },
    {
        "symbol": "TLH",
        "annualized div": "2.6474",
        "div yield": "1.9100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.220618"
    },
    {
        "symbol": "TLO",
        "annualized div": "1.6815",
        "div yield": "2.2400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.140121"
    },
    {
        "symbol": "TLT",
        "annualized div": "3.0251",
        "div yield": "2.3200%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.25209"
    },
    {
        "symbol": "TRSY",
        "annualized div": "1.45",
        "div yield": "1.4500%",
        "ex div date": "02/28/2014",
        "record date": "03/04/2014",
        "pay date": "03/06/2014",
        "next payout": "0.13"
    },
    {
        "symbol": "TUZ",
        "annualized div": "0.24",
        "div yield": "0.4700%",
        "ex div date": "03/31/2015",
        "record date": "04/02/2015",
        "pay date": "04/07/2015",
        "next payout": "0.02"
    },
    {
        "symbol": "TW",
        "annualized div": "0.6",
        "div yield": "0.4600%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/15/2015",
        "next payout": "0.15"
    },
    {
        "symbol": "TZD",
        "annualized div": "0.91",
        "div yield": "2.5600%",
        "ex div date": "10/02/2014",
        "record date": "10/06/2014",
        "pay date": "10/08/2014",
        "next payout": "0.075498"
    },
    {
        "symbol": "HFIN",
        "annualized div": "0.6549",
        "div yield": "1.5600%",
        "ex div date": "02/25/2015",
        "record date": "02/27/2015",
        "pay date": "03/11/2015",
        "next payout": "0.054568"
    },
    {
        "symbol": "USD",
        "annualized div": "0.5251",
        "div yield": "0.5800%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "04/02/2015",
        "next payout": "0.131283"
    },
    {
        "symbol": "VBF",
        "annualized div": "0.85",
        "div yield": "4.5700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.071"
    },
    {
        "symbol": "VCF",
        "annualized div": "0.69",
        "div yield": "4.8300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/27/2015",
        "next payout": "0.0575"
    },
    {
        "symbol": "VCIT",
        "annualized div": "2.748",
        "div yield": "3.1400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.229"
    },
    {
        "symbol": "VCLT",
        "annualized div": "3.756",
        "div yield": "3.9900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.313"
    },
    {
        "symbol": "VCSH",
        "annualized div": "1.488",
        "div yield": "1.8600%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.124"
    },
    {
        "symbol": "VCV",
        "annualized div": "0.79",
        "div yield": "5.9400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.066"
    },
    {
        "symbol": "VFL",
        "annualized div": "0.72",
        "div yield": "5.500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/27/2015",
        "next payout": "0.065"
    },
    {
        "symbol": "VGIT",
        "annualized div": "1.068",
        "div yield": "1.6400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.089"
    },
    {
        "symbol": "VGLT",
        "annualized div": "3.768",
        "div yield": "4.700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.172"
    },
    {
        "symbol": "VGM",
        "annualized div": "0.89",
        "div yield": "6.6600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.074"
    },
    {
        "symbol": "VGSH",
        "annualized div": "0.36",
        "div yield": "0.5900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.03"
    },
    {
        "symbol": "VKI",
        "annualized div": "0.78",
        "div yield": "6.7100%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.065"
    },
    {
        "symbol": "VKQ",
        "annualized div": "0.82",
        "div yield": "6.4600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.068"
    },
    {
        "symbol": "VMBS",
        "annualized div": "0.792",
        "div yield": "1.4800%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.066"
    },
    {
        "symbol": "VMM",
        "annualized div": "0.63",
        "div yield": "4.5500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/27/2015",
        "next payout": "0.0525"
    },
    {
        "symbol": "VMO",
        "annualized div": "0.79",
        "div yield": "6.1300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.066"
    },
    {
        "symbol": "VOQ",
        "annualized div": "1.21",
        "div yield": "7.0300%",
        "ex div date": "10/10/2012",
        "record date": "10/12/2012",
        "pay date": "10/31/2012",
        "next payout": "0.272"
    },
    {
        "symbol": "VRD",
        "annualized div": "0",
        "div yield": "0%",
        "ex div date": "06/03/2013",
        "record date": "06/05/2013",
        "pay date": "06/11/2013",
        "next payout": "0.001962"
    },
    {
        "symbol": "VVR",
        "annualized div": "0.336",
        "div yield": "7.0400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.028"
    },
    {
        "symbol": "XAA",
        "annualized div": "1.67",
        "div yield": "11.5700%",
        "ex div date": "10/01/2014",
        "record date": "10/03/2014",
        "pay date": "10/22/2014",
        "next payout": "0.139"
    },
    {
        "symbol": "XRU",
        "annualized div": "0.33",
        "div yield": "0.9900%",
        "ex div date": "09/01/2011",
        "record date": "09/06/2011",
        "pay date": "09/09/2011",
        "next payout": "0.052"
    },
    {
        "symbol": "ZTR",
        "annualized div": "1.092",
        "div yield": "7.9600%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "03/19/2015",
        "next payout": "0.091"
    },
    {
        "symbol": "MHR-D",
        "annualized div": "4",
        "div yield": "11.5300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.3333"
    },
    {
        "symbol": "STB",
        "annualized div": "0.55642",
        "div yield": "10.400%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/15/2015",
        "next payout": "0.0463683"
    },
    {
        "symbol": "SPLV",
        "annualized div": "0.9169",
        "div yield": "2.400%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.07641"
    },
    {
        "symbol": "ETX",
        "annualized div": "0.85",
        "div yield": "4.7800%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.070833"
    },
    {
        "symbol": "AFT",
        "annualized div": "1.1724",
        "div yield": "6.5900%",
        "ex div date": "04/16/2015",
        "record date": "04/20/2015",
        "pay date": "04/30/2015",
        "next payout": "0.0977"
    },
    {
        "symbol": "AUNZ",
        "annualized div": "0.54",
        "div yield": "2.9600%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.045"
    },
    {
        "symbol": "BCX",
        "annualized div": "0.786",
        "div yield": "8.300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.0655"
    },
    {
        "symbol": "BKLN",
        "annualized div": "0.8765",
        "div yield": "3.6300%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.07304"
    },
    {
        "symbol": "BONO",
        "annualized div": "1.14",
        "div yield": "4.8400%",
        "ex div date": "12/02/2013",
        "record date": "12/04/2013",
        "pay date": "12/06/2013",
        "next payout": "0.09"
    },
    {
        "symbol": "CAD",
        "annualized div": "0.96",
        "div yield": "1.00%",
        "ex div date": "08/29/2014",
        "record date": "09/03/2014",
        "pay date": "09/05/2014",
        "next payout": "0.2"
    },
    {
        "symbol": "CBND",
        "annualized div": "0.9495",
        "div yield": "2.8900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.079124"
    },
    {
        "symbol": "CHLC",
        "annualized div": "0.12",
        "div yield": "0.4800%",
        "ex div date": "12/09/2014",
        "record date": "12/11/2014",
        "pay date": "12/15/2014",
        "next payout": "0.6043"
    },
    {
        "symbol": "CNPF",
        "annualized div": "0.5",
        "div yield": "4.2400%",
        "ex div date": "10/01/2014",
        "record date": "10/03/2014",
        "pay date": "10/10/2014",
        "next payout": "0.0415"
    },
    {
        "symbol": "CVRT",
        "annualized div": "0",
        "div yield": "0%",
        "ex div date": "01/15/2013",
        "record date": "01/17/2013",
        "pay date": "01/31/2013",
        "next payout": "0.0565"
    },
    {
        "symbol": "DSUM",
        "annualized div": "0.7577",
        "div yield": "3.1300%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.06314"
    },
    {
        "symbol": "EU",
        "annualized div": "0.68",
        "div yield": "3.3100%",
        "ex div date": "01/26/2015",
        "record date": "01/28/2015",
        "pay date": "01/30/2015",
        "next payout": "0.05063"
    },
    {
        "symbol": "FIF",
        "annualized div": "1.32",
        "div yield": "5.800%",
        "ex div date": "04/01/2015",
        "record date": "04/06/2015",
        "pay date": "04/15/2015",
        "next payout": "0.11"
    },
    {
        "symbol": "FLOT",
        "annualized div": "0.2214",
        "div yield": "0.4400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.018453"
    },
    {
        "symbol": "FLRN",
        "annualized div": "0.1717",
        "div yield": "0.5600%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.014306"
    },
    {
        "symbol": "FLTR",
        "annualized div": "0.1488",
        "div yield": "0.600%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0124"
    },
    {
        "symbol": "FWDB",
        "annualized div": "0.6905",
        "div yield": "2.6900%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.05754"
    },
    {
        "symbol": "GIY",
        "annualized div": "1.4",
        "div yield": "2.7900%",
        "ex div date": "02/03/2014",
        "record date": "02/05/2014",
        "pay date": "02/07/2014",
        "next payout": "0.1356"
    },
    {
        "symbol": "GJK",
        "annualized div": "0.75",
        "div yield": "3.0100%",
        "ex div date": "03/12/2014",
        "record date": "03/14/2014",
        "pay date": "03/17/2014",
        "next payout": "0.0575342"
    },
    {
        "symbol": "GSY",
        "annualized div": "0.5712",
        "div yield": "1.1400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0476"
    },
    {
        "symbol": "HCIIP",
        "annualized div": "0.6999996",
        "div yield": "1.4700%",
        "ex div date": "02/27/2014",
        "record date": "03/03/2014",
        "pay date": "03/27/2014",
        "next payout": "0.0583333"
    },
    {
        "symbol": "HYMB",
        "annualized div": "2.5344",
        "div yield": "4.400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.211202"
    },
    {
        "symbol": "HYS",
        "annualized div": "4.32",
        "div yield": "4.2400%",
        "ex div date": "03/31/2015",
        "record date": "04/02/2015",
        "pay date": "04/07/2015",
        "next payout": "0.36"
    },
    {
        "symbol": "INF",
        "annualized div": "1.4004",
        "div yield": "6.7400%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/26/2015",
        "next payout": "0.1167"
    },
    {
        "symbol": "IPFF",
        "annualized div": "0.832",
        "div yield": "4.100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.069337"
    },
    {
        "symbol": "JE",
        "annualized div": "0.5",
        "div yield": "10.7100%",
        "ex div date": "03/12/2015",
        "record date": "03/16/2015",
        "pay date": "03/31/2015",
        "next payout": "0.125"
    },
    {
        "symbol": "JSD",
        "annualized div": "1.164",
        "div yield": "6.800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.097"
    },
    {
        "symbol": "LEMB",
        "annualized div": "0.827",
        "div yield": "1.8800%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.068919"
    },
    {
        "symbol": "PBA",
        "annualized div": "1.74",
        "div yield": "5.5200%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "04/15/2015",
        "next payout": "0.145"
    },
    {
        "symbol": "PFIG",
        "annualized div": "0.6451",
        "div yield": "2.5100%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.05376"
    },
    {
        "symbol": "PFLT",
        "annualized div": "1.14",
        "div yield": "8.0900%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "04/01/2015",
        "next payout": "0.095"
    },
    {
        "symbol": "PVX",
        "annualized div": "0.54",
        "div yield": "0%",
        "ex div date": "03/15/2012",
        "record date": "03/19/2012",
        "pay date": "04/13/2012",
        "next payout": "0.045"
    },
    {
        "symbol": "RMB",
        "annualized div": "0",
        "div yield": "0%",
        "ex div date": "05/01/2013",
        "record date": "05/03/2013",
        "pay date": "05/07/2013",
        "next payout": "0.064"
    },
    {
        "symbol": "SCHZ",
        "annualized div": "1.0704",
        "div yield": "2.0300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0892"
    },
    {
        "symbol": "SDIV",
        "annualized div": "1.45",
        "div yield": "6.2200%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/11/2015",
        "next payout": "0.1205"
    },
    {
        "symbol": "SST",
        "annualized div": "0.2262",
        "div yield": "0.7500%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.018854"
    },
    {
        "symbol": "SUNS",
        "annualized div": "1.41",
        "div yield": "8.5700%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "04/02/2015",
        "next payout": "0.1175"
    },
    {
        "symbol": "XMPT",
        "annualized div": "1.344",
        "div yield": "5.0600%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.112"
    },
    {
        "symbol": "ARCT",
        "annualized div": "0.69996",
        "div yield": "5.3800%",
        "ex div date": "01/04/2013",
        "record date": "01/08/2013",
        "pay date": "01/15/2013",
        "next payout": "0.05958"
    },
    {
        "symbol": "EMCB",
        "annualized div": "3.96",
        "div yield": "5.5400%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.28"
    },
    {
        "symbol": "AMPS",
        "annualized div": "1.4671",
        "div yield": "2.7700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.122259"
    },
    {
        "symbol": "ANGL",
        "annualized div": "1.344",
        "div yield": "4.900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.112"
    },
    {
        "symbol": "BOND",
        "annualized div": "2.16",
        "div yield": "1.9600%",
        "ex div date": "03/31/2015",
        "record date": "04/02/2015",
        "pay date": "04/07/2015",
        "next payout": "0.18"
    },
    {
        "symbol": "BOXC",
        "annualized div": "1.17",
        "div yield": "5.1800%",
        "ex div date": "04/28/2015",
        "record date": "04/30/2015",
        "pay date": "05/15/2015",
        "next payout": "0.1033"
    },
    {
        "symbol": "BSCI",
        "annualized div": "0.3336",
        "div yield": "1.5600%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0278"
    },
    {
        "symbol": "BSCJ",
        "annualized div": "0.3852",
        "div yield": "1.8100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0321"
    },
    {
        "symbol": "BSCK",
        "annualized div": "0.4752",
        "div yield": "2.2100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0396"
    },
    {
        "symbol": "BSJG",
        "annualized div": "0.8904",
        "div yield": "3.3800%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0742"
    },
    {
        "symbol": "BSJH",
        "annualized div": "0.948",
        "div yield": "3.5900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.079"
    },
    {
        "symbol": "BSJI",
        "annualized div": "1.0764",
        "div yield": "4.1400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0897"
    },
    {
        "symbol": "BWG",
        "annualized div": "1.44",
        "div yield": "8.9200%",
        "ex div date": "04/15/2015",
        "record date": "04/17/2015",
        "pay date": "04/24/2015",
        "next payout": "0.13"
    },
    {
        "symbol": "CMBS",
        "annualized div": "1.2046",
        "div yield": "2.3100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.100384"
    },
    {
        "symbol": "COBO",
        "annualized div": "1.0203",
        "div yield": "1.0200%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.085021"
    },
    {
        "symbol": "DVYL",
        "annualized div": "5.1912",
        "div yield": "10.5400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/23/2015",
        "next payout": "0.4326"
    },
    {
        "symbol": "EMCD",
        "annualized div": "1.247",
        "div yield": "4.300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.103915"
    },
    {
        "symbol": "ENGN",
        "annualized div": "1.4816",
        "div yield": "2.900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.123464"
    },
    {
        "symbol": "GAINP",
        "annualized div": "1.781256",
        "div yield": "6.8800%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.148438"
    },
    {
        "symbol": "GGOV",
        "annualized div": "0.83",
        "div yield": "2.3300%",
        "ex div date": "12/22/2014",
        "record date": "12/24/2014",
        "pay date": "12/31/2014",
        "next payout": "0.0277"
    },
    {
        "symbol": "GLADP",
        "annualized div": "0",
        "div yield": "0%",
        "ex div date": "05/16/2014",
        "record date": "05/20/2014",
        "pay date": "05/23/2014",
        "next payout": "0.148438"
    },
    {
        "symbol": "GNMA",
        "annualized div": "0.7102",
        "div yield": "1.4100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.059183"
    },
    {
        "symbol": "GOODN",
        "annualized div": "1.781256",
        "div yield": "6.9600%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.148438"
    },
    {
        "symbol": "GOVT",
        "annualized div": "0.2728",
        "div yield": "1.0700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.022733"
    },
    {
        "symbol": "HYEM",
        "annualized div": "1.56",
        "div yield": "6.6800%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.13"
    },
    {
        "symbol": "DBL",
        "annualized div": "2",
        "div yield": "8.0500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.167"
    },
    {
        "symbol": "IHY",
        "annualized div": "1.2",
        "div yield": "4.9900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.1"
    },
    {
        "symbol": "ISD",
        "annualized div": "1.47",
        "div yield": "9.0100%",
        "ex div date": "04/15/2015",
        "record date": "04/17/2015",
        "pay date": "04/30/2015",
        "next payout": "0.1225"
    },
    {
        "symbol": "JRI",
        "annualized div": "1.266",
        "div yield": "6.5200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.1345"
    },
    {
        "symbol": "MONY",
        "annualized div": "1.3766",
        "div yield": "2.500%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.114716"
    },
    {
        "symbol": "PDI",
        "annualized div": "2.292",
        "div yield": "7.8900%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "04/01/2015",
        "next payout": "0.191"
    },
    {
        "symbol": "QLTA",
        "annualized div": "1.2868",
        "div yield": "2.4500%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.107236"
    },
    {
        "symbol": "RWXL",
        "annualized div": "1.6524",
        "div yield": "4.500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/23/2015",
        "next payout": "0.1377"
    },
    {
        "symbol": "SDYL",
        "annualized div": "3.2676",
        "div yield": "5.9400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/23/2015",
        "next payout": "0.2723"
    },
    {
        "symbol": "SJNK",
        "annualized div": "1.5495",
        "div yield": "5.300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.129121"
    },
    {
        "symbol": "VGI",
        "annualized div": "3",
        "div yield": "17.900%",
        "ex div date": "04/09/2015",
        "record date": "04/13/2015",
        "pay date": "04/20/2015",
        "next payout": "0.156"
    },
    {
        "symbol": "XOVR",
        "annualized div": "0.8439",
        "div yield": "3.1900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.070326"
    },
    {
        "symbol": "ARR-A",
        "annualized div": "2.06",
        "div yield": "8.3600%",
        "ex div date": "03/11/2015",
        "record date": "03/15/2015",
        "pay date": "03/27/2015",
        "next payout": "0.171875"
    },
    {
        "symbol": "EPM-A",
        "annualized div": "2.124996",
        "div yield": "8.4100%",
        "ex div date": "03/12/2015",
        "record date": "03/16/2015",
        "pay date": "03/31/2015",
        "next payout": "0.177083"
    },
    {
        "symbol": "GLAD-A",
        "annualized div": "1.781256",
        "div yield": "6.9900%",
        "ex div date": "12/14/2011",
        "record date": "12/16/2011",
        "pay date": "12/30/2011",
        "next payout": "0.133594"
    },
    {
        "symbol": "GST-A",
        "annualized div": "2.156256",
        "div yield": "10.0800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.179688"
    },
    {
        "symbol": "IRC-A",
        "annualized div": "2.031252",
        "div yield": "7.7100%",
        "ex div date": "03/30/2015",
        "record date": "04/01/2015",
        "pay date": "04/15/2015",
        "next payout": "0.169271"
    },
    {
        "symbol": "KYN-E",
        "annualized div": "1.06",
        "div yield": "4.1900%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "05/01/2015",
        "next payout": "0.088542"
    },
    {
        "symbol": "NBJ-A",
        "annualized div": "0.23",
        "div yield": "2.2900%",
        "ex div date": "04/03/2013",
        "record date": "04/05/2013",
        "pay date": "05/01/2013",
        "next payout": "0.004569"
    },
    {
        "symbol": "NKG-D",
        "annualized div": "0",
        "div yield": "0%",
        "ex div date": "04/11/2014",
        "record date": "04/15/2014",
        "pay date": "05/01/2014",
        "next payout": "0.022083"
    },
    {
        "symbol": "NKG-E",
        "annualized div": "0",
        "div yield": "0%",
        "ex div date": "04/11/2014",
        "record date": "04/15/2014",
        "pay date": "05/01/2014",
        "next payout": "0.022083"
    },
    {
        "symbol": "NMY-D",
        "annualized div": "0",
        "div yield": "0%",
        "ex div date": "04/11/2014",
        "record date": "04/15/2014",
        "pay date": "05/01/2014",
        "next payout": "0.024167"
    },
    {
        "symbol": "NPV-A",
        "annualized div": "0.225",
        "div yield": "2.2500%",
        "ex div date": "08/13/2013",
        "record date": "08/15/2013",
        "pay date": "09/03/2013",
        "next payout": "0.01875"
    },
    {
        "symbol": "NTC-E",
        "annualized div": "0.19",
        "div yield": "1.8900%",
        "ex div date": "02/12/2014",
        "record date": "02/14/2014",
        "pay date": "03/03/2014",
        "next payout": "0.021667"
    },
    {
        "symbol": "NTC-F",
        "annualized div": "0.19",
        "div yield": "1.3300%",
        "ex div date": "02/12/2014",
        "record date": "02/14/2014",
        "pay date": "03/03/2014",
        "next payout": "0.021667"
    },
    {
        "symbol": "NTC-G",
        "annualized div": "0.19",
        "div yield": "1.8900%",
        "ex div date": "02/12/2014",
        "record date": "02/14/2014",
        "pay date": "03/03/2014",
        "next payout": "0.022083"
    },
    {
        "symbol": "TYY-C",
        "annualized div": "0.4",
        "div yield": "3.8800%",
        "ex div date": "06/11/2014",
        "record date": "06/15/2014",
        "pay date": "07/01/2014",
        "next payout": "0.032917"
    },
    {
        "symbol": "JPI",
        "annualized div": "1.914",
        "div yield": "8.1700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.1595"
    },
    {
        "symbol": "LDP",
        "annualized div": "1.872",
        "div yield": "7.7900%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.156"
    },
    {
        "symbol": "GRH-C",
        "annualized div": "2.5",
        "div yield": "13.300%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.208333"
    },
    {
        "symbol": "NPV-D",
        "annualized div": "0.28",
        "div yield": "2.7900%",
        "ex div date": "08/13/2013",
        "record date": "08/15/2013",
        "pay date": "09/03/2013",
        "next payout": "0.023333"
    },
    {
        "symbol": "MORL",
        "annualized div": "0.7212",
        "div yield": "3.4700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/23/2015",
        "next payout": "0.0601"
    },
    {
        "symbol": "WHLR",
        "annualized div": "0.21",
        "div yield": "9.0500%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/30/2015",
        "next payout": "0.0175"
    },
    {
        "symbol": "CPG",
        "annualized div": "2.76",
        "div yield": "12.1800%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/15/2015",
        "next payout": "0.23"
    },
    {
        "symbol": "OXLCP",
        "annualized div": "2.13",
        "div yield": "8.2400%",
        "ex div date": "04/14/2015",
        "record date": "04/16/2015",
        "pay date": "04/30/2015",
        "next payout": "0.1771"
    },
    {
        "symbol": "NID",
        "annualized div": "0.66",
        "div yield": "5.1300%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.057"
    },
    {
        "symbol": "O-F",
        "annualized div": "1.66",
        "div yield": "6.2400%",
        "ex div date": "03/30/2015",
        "record date": "04/01/2015",
        "pay date": "04/15/2015",
        "next payout": "0.138021"
    },
    {
        "symbol": "MDIV",
        "annualized div": "1.68",
        "div yield": "7.9800%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.14"
    },
    {
        "symbol": "GLDI",
        "annualized div": "0.9612",
        "div yield": "8.1700%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/25/2015",
        "next payout": "0.0801"
    },
    {
        "symbol": "ORC",
        "annualized div": "2.16",
        "div yield": "16.3400%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.18"
    },
    {
        "symbol": "LAND",
        "annualized div": "1.44",
        "div yield": "11.9900%",
        "ex div date": "03/18/2015",
        "record date": "03/20/2015",
        "pay date": "03/31/2015",
        "next payout": "0.035"
    },
    {
        "symbol": "GLCB",
        "annualized div": "3",
        "div yield": "3.9500%",
        "ex div date": "05/23/2014",
        "record date": "05/28/2014",
        "pay date": "05/30/2014",
        "next payout": "0.26"
    },
    {
        "symbol": "PCI",
        "annualized div": "1.875",
        "div yield": "9.1900%",
        "ex div date": "03/10/2015",
        "record date": "03/12/2015",
        "pay date": "04/01/2015",
        "next payout": "0.15625"
    },
    {
        "symbol": "IMLP",
        "annualized div": "1.4546",
        "div yield": "5.0500%",
        "ex div date": "02/26/2015",
        "record date": "03/02/2015",
        "pay date": "03/10/2015",
        "next payout": "0.363661"
    },
    {
        "symbol": "DIV",
        "annualized div": "1.99",
        "div yield": "7.0300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/11/2015",
        "next payout": "0.1655"
    },
    {
        "symbol": "ARR-B",
        "annualized div": "1.97",
        "div yield": "8.2500%",
        "ex div date": "03/11/2015",
        "record date": "03/15/2015",
        "pay date": "03/27/2015",
        "next payout": "0.164062"
    },
    {
        "symbol": "NIQ",
        "annualized div": "0.58",
        "div yield": "4.4800%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0495"
    },
    {
        "symbol": "FPE",
        "annualized div": "1.32",
        "div yield": "6.8800%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.11"
    },
    {
        "symbol": "AIF",
        "annualized div": "1.4",
        "div yield": "8.5400%",
        "ex div date": "04/16/2015",
        "record date": "04/20/2015",
        "pay date": "04/30/2015",
        "next payout": "0.117"
    },
    {
        "symbol": "BIT",
        "annualized div": "1.4",
        "div yield": "7.9900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.1167"
    },
    {
        "symbol": "OAKS",
        "annualized div": "1.56",
        "div yield": "14.6100%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "04/29/2015",
        "next payout": "0.125"
    },
    {
        "symbol": "MINC",
        "annualized div": "1.4584",
        "div yield": "2.9600%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.12153"
    },
    {
        "symbol": "BOI",
        "annualized div": "1.53",
        "div yield": "9.3500%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/26/2015",
        "next payout": "0.1271"
    },
    {
        "symbol": "MUAG",
        "annualized div": "0.22",
        "div yield": "0.8600%",
        "ex div date": "07/01/2014",
        "record date": "07/03/2014",
        "pay date": "07/08/2014",
        "next payout": "0.019962"
    },
    {
        "symbol": "SRLN",
        "annualized div": "1.8768",
        "div yield": "3.800%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.156403"
    },
    {
        "symbol": "THHY",
        "annualized div": "0.6",
        "div yield": "2.4700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.05"
    },
    {
        "symbol": "FTSL",
        "annualized div": "1.8",
        "div yield": "3.6600%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.15"
    },
    {
        "symbol": "DMB",
        "annualized div": "0.75",
        "div yield": "5.8900%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "04/01/2015",
        "next payout": "0.0625"
    },
    {
        "symbol": "BNDX",
        "annualized div": "0.744",
        "div yield": "1.3800%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.062"
    },
    {
        "symbol": "IBCB",
        "annualized div": "0.612",
        "div yield": "0.6100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.050999"
    },
    {
        "symbol": "IBCC",
        "annualized div": "1.4201",
        "div yield": "1.4300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.118342"
    },
    {
        "symbol": "IBCD",
        "annualized div": "2.1393",
        "div yield": "2.1400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.178279"
    },
    {
        "symbol": "IBCE",
        "annualized div": "2.6084",
        "div yield": "2.6400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.21737"
    },
    {
        "symbol": "DSL",
        "annualized div": "1.8",
        "div yield": "9.0600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.15"
    },
    {
        "symbol": "HCAP",
        "annualized div": "1.35",
        "div yield": "10.4200%",
        "ex div date": "04/21/2015",
        "record date": "04/23/2015",
        "pay date": "04/30/2015",
        "next payout": "0.1125"
    },
    {
        "symbol": "LTS-A",
        "annualized div": "2.33",
        "div yield": "9.6900%",
        "ex div date": "03/11/2015",
        "record date": "03/15/2015",
        "pay date": "03/30/2015",
        "next payout": "0.166667"
    },
    {
        "symbol": "DGRW",
        "annualized div": "0.7609",
        "div yield": "2.4100%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.06341"
    },
    {
        "symbol": "VWOB",
        "annualized div": "3.432",
        "div yield": "4.4200%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.286"
    },
    {
        "symbol": "OXLCO",
        "annualized div": "1.88",
        "div yield": "7.5200%",
        "ex div date": "04/14/2015",
        "record date": "04/16/2015",
        "pay date": "04/30/2015",
        "next payout": "0.15625"
    },
    {
        "symbol": "VNRAP",
        "annualized div": "1.97",
        "div yield": "8.200%",
        "ex div date": "03/30/2015",
        "record date": "04/01/2015",
        "pay date": "04/15/2015",
        "next payout": "0.1641"
    },
    {
        "symbol": "KIO",
        "annualized div": "1.5",
        "div yield": "9.100%",
        "ex div date": "04/16/2015",
        "record date": "04/20/2015",
        "pay date": "04/27/2015",
        "next payout": "0.125"
    },
    {
        "symbol": "YYY",
        "annualized div": "1.92",
        "div yield": "9.0600%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/30/2015",
        "next payout": "0.16"
    },
    {
        "symbol": "HSPX",
        "annualized div": "0.83",
        "div yield": "1.8200%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "04/09/2015",
        "next payout": "0.069164"
    },
    {
        "symbol": "JPW",
        "annualized div": "1.512",
        "div yield": "8.8700%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.126"
    },
    {
        "symbol": "BSCL",
        "annualized div": "0.4992",
        "div yield": "2.3500%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0416"
    },
    {
        "symbol": "EFF",
        "annualized div": "1.152",
        "div yield": "6.800%",
        "ex div date": "03/20/2015",
        "record date": "03/24/2015",
        "pay date": "03/31/2015",
        "next payout": "0.096"
    },
    {
        "symbol": "MHR-E",
        "annualized div": "2",
        "div yield": "8.0500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.1667"
    },
    {
        "symbol": "ORM",
        "annualized div": "0.28",
        "div yield": "1.900%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/14/2015",
        "next payout": "0.07"
    },
    {
        "symbol": "BSCM",
        "annualized div": "0.444",
        "div yield": "2.0900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.037"
    },
    {
        "symbol": "TIPX",
        "annualized div": "0.1006",
        "div yield": "0.5200%",
        "ex div date": "12/29/2014",
        "record date": "12/31/2014",
        "pay date": "01/07/2015",
        "next payout": "0.083912"
    },
    {
        "symbol": "IBDC",
        "annualized div": "2.3614",
        "div yield": "2.2200%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.196783"
    },
    {
        "symbol": "IBDB",
        "annualized div": "1.6166",
        "div yield": "1.5700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.13472"
    },
    {
        "symbol": "YDIV",
        "annualized div": "0.72",
        "div yield": "3.7800%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.06"
    },
    {
        "symbol": "FNDA",
        "annualized div": "0.3124",
        "div yield": "1.00%",
        "ex div date": "03/30/2015",
        "record date": "04/01/2015",
        "pay date": "04/06/2015",
        "next payout": "0.0781"
    },
    {
        "symbol": "FEI",
        "annualized div": "1.38",
        "div yield": "6.6800%",
        "ex div date": "04/01/2015",
        "record date": "04/06/2015",
        "pay date": "04/15/2015",
        "next payout": "0.115"
    },
    {
        "symbol": "DGRS",
        "annualized div": "1.2",
        "div yield": "3.9700%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.1"
    },
    {
        "symbol": "FNDB",
        "annualized div": "0.5912",
        "div yield": "1.9500%",
        "ex div date": "03/30/2015",
        "record date": "04/01/2015",
        "pay date": "04/06/2015",
        "next payout": "0.1478"
    },
    {
        "symbol": "FTSD",
        "annualized div": "1.2443",
        "div yield": "1.2500%",
        "ex div date": "03/31/2015",
        "record date": "04/02/2015",
        "pay date": "04/07/2015",
        "next payout": "0.10369"
    },
    {
        "symbol": "CEN",
        "annualized div": "1.25",
        "div yield": "7.1400%",
        "ex div date": "04/08/2015",
        "record date": "04/10/2015",
        "pay date": "04/28/2015",
        "next payout": "0.1042"
    },
    {
        "symbol": "BSJJ",
        "annualized div": "1.008",
        "div yield": "4.00%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.084"
    },
    {
        "symbol": "BSJK",
        "annualized div": "1.1904",
        "div yield": "4.6700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0992"
    },
    {
        "symbol": "RIGS",
        "annualized div": "0.9861",
        "div yield": "3.9300%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "04/01/2015",
        "next payout": "0.082171"
    },
    {
        "symbol": "DVHL",
        "annualized div": "3.3984",
        "div yield": "14.1400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/23/2015",
        "next payout": "0.2832"
    },
    {
        "symbol": "GST-B",
        "annualized div": "2.69",
        "div yield": "11.0200%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/31/2015",
        "next payout": "0.223958"
    },
    {
        "symbol": "IVH",
        "annualized div": "2.94",
        "div yield": "17.9800%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.125"
    },
    {
        "symbol": "QYLD",
        "annualized div": "1.9158",
        "div yield": "8.1300%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "04/01/2015",
        "next payout": "0.159652"
    },
    {
        "symbol": "AGND",
        "annualized div": "0.66",
        "div yield": "1.4800%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.055"
    },
    {
        "symbol": "AGZD",
        "annualized div": "0.72",
        "div yield": "1.4700%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.06"
    },
    {
        "symbol": "ARCPP",
        "annualized div": "1.68",
        "div yield": "7.1400%",
        "ex div date": "03/30/2015",
        "record date": "04/01/2015",
        "pay date": "04/15/2015",
        "next payout": "0.139583"
    },
    {
        "symbol": "HYND",
        "annualized div": "0.72",
        "div yield": "3.3700%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.06"
    },
    {
        "symbol": "HYZD",
        "annualized div": "0.9",
        "div yield": "3.7700%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.075"
    },
    {
        "symbol": "SEMF",
        "annualized div": "0.2",
        "div yield": "1.00%",
        "ex div date": "08/25/2014",
        "record date": "08/27/2014",
        "pay date": "08/28/2014",
        "next payout": "0.02013"
    },
    {
        "symbol": "FTHI",
        "annualized div": "1.02",
        "div yield": "4.8900%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.085"
    },
    {
        "symbol": "DI",
        "annualized div": "2.04",
        "div yield": "4.0900%",
        "ex div date": "03/31/2015",
        "record date": "04/02/2015",
        "pay date": "04/07/2015",
        "next payout": "0.17"
    },
    {
        "symbol": "IEM-F",
        "annualized div": "0.64",
        "div yield": "3.1800%",
        "ex div date": "08/25/2014",
        "record date": "08/27/2014",
        "pay date": "08/28/2014",
        "next payout": "0.05093"
    },
    {
        "symbol": "LEMF",
        "annualized div": "0.78",
        "div yield": "3.7800%",
        "ex div date": "08/25/2014",
        "record date": "08/27/2014",
        "pay date": "08/28/2014",
        "next payout": "0.05814"
    },
    {
        "symbol": "LDUR",
        "annualized div": "0.96",
        "div yield": "0.9500%",
        "ex div date": "03/31/2015",
        "record date": "04/02/2015",
        "pay date": "04/07/2015",
        "next payout": "0.08"
    },
    {
        "symbol": "MUAH",
        "annualized div": "0.24",
        "div yield": "0.9500%",
        "ex div date": "07/01/2014",
        "record date": "07/03/2014",
        "pay date": "07/08/2014",
        "next payout": "0.024072"
    },
    {
        "symbol": "NQP-C",
        "annualized div": "0",
        "div yield": "0%",
        "ex div date": "04/11/2014",
        "record date": "04/15/2014",
        "pay date": "05/01/2014",
        "next payout": "0.0175"
    },
    {
        "symbol": "SHYD",
        "annualized div": "0.7212",
        "div yield": "2.8300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0601"
    },
    {
        "symbol": "BRG",
        "annualized div": "1.16",
        "div yield": "8.6100%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "04/05/2015",
        "next payout": "0.096667"
    },
    {
        "symbol": "HCT",
        "annualized div": "0.68",
        "div yield": "5.1800%",
        "ex div date": "01/06/2015",
        "record date": "01/08/2015",
        "pay date": "01/15/2015",
        "next payout": "0.0566667"
    },
    {
        "symbol": "CRED",
        "annualized div": "2.9409",
        "div yield": "2.600%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.245076"
    },
    {
        "symbol": "LGCYP",
        "annualized div": "1.86",
        "div yield": "9.3800%",
        "ex div date": "03/30/2015",
        "record date": "04/01/2015",
        "pay date": "04/15/2015",
        "next payout": "0.166667"
    },
    {
        "symbol": "ULST",
        "annualized div": "0.1698",
        "div yield": "0.4200%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/10/2015",
        "next payout": "0.014152"
    },
    {
        "symbol": "OXLCN",
        "annualized div": "2.03",
        "div yield": "8.0500%",
        "ex div date": "04/14/2015",
        "record date": "04/16/2015",
        "pay date": "04/30/2015",
        "next payout": "0.1693"
    },
    {
        "symbol": "FPF",
        "annualized div": "1.89",
        "div yield": "8.3800%",
        "ex div date": "04/01/2015",
        "record date": "04/06/2015",
        "pay date": "04/15/2015",
        "next payout": "0.1625"
    },
    {
        "symbol": "GHY",
        "annualized div": "1.5",
        "div yield": "9.3600%",
        "ex div date": "04/15/2015",
        "record date": "04/17/2015",
        "pay date": "04/30/2015",
        "next payout": "0.125"
    },
    {
        "symbol": "LMLP",
        "annualized div": "10.7976",
        "div yield": "45.0500%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/23/2015",
        "next payout": "0.8998"
    },
    {
        "symbol": "ENLC",
        "annualized div": "0.94",
        "div yield": "2.8800%",
        "ex div date": "01/29/2015",
        "record date": "02/02/2015",
        "pay date": "02/13/2015",
        "next payout": "0.235"
    },
    {
        "symbol": "NYRT",
        "annualized div": "0.46",
        "div yield": "4.3900%",
        "ex div date": "04/06/2015",
        "record date": "04/08/2015",
        "pay date": "04/15/2015",
        "next payout": "0.0383333"
    },
    {
        "symbol": "SIPE",
        "annualized div": "0.54",
        "div yield": "2.7800%",
        "ex div date": "12/29/2014",
        "record date": "12/31/2014",
        "pay date": "01/07/2015",
        "next payout": "0.033043"
    },
    {
        "symbol": "TFLO",
        "annualized div": "0.0446",
        "div yield": "0.0900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.003717"
    },
    {
        "symbol": "FSIC",
        "annualized div": "0.89",
        "div yield": "8.8200%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "04/02/2015",
        "next payout": "0.22275"
    },
    {
        "symbol": "BGH",
        "annualized div": "2.01",
        "div yield": "9.6800%",
        "ex div date": "04/20/2015",
        "record date": "04/22/2015",
        "pay date": "05/01/2015",
        "next payout": "0.1677"
    },
    {
        "symbol": "LGCYO",
        "annualized div": "2",
        "div yield": "10.0800%",
        "ex div date": "03/30/2015",
        "record date": "04/01/2015",
        "pay date": "04/15/2015",
        "next payout": "0.166667"
    },
    {
        "symbol": "BYLD",
        "annualized div": "0.6409",
        "div yield": "2.5200%",
        "ex div date": "03/03/2015",
        "record date": "03/05/2015",
        "pay date": "03/09/2015",
        "next payout": "0.053407"
    },
    {
        "symbol": "BBEPP",
        "annualized div": "2.06",
        "div yield": "9.9600%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/15/2015",
        "next payout": "0.171875"
    },
    {
        "symbol": "LDRI",
        "annualized div": "0.2939",
        "div yield": "1.1800%",
        "ex div date": "03/13/2015",
        "record date": "03/17/2015",
        "pay date": "03/31/2015",
        "next payout": "0.02449"
    },
    {
        "symbol": "UDF",
        "annualized div": "1.64",
        "div yield": "9.0900%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/25/2015",
        "next payout": "0.1367"
    },
    {
        "symbol": "CRDT",
        "annualized div": "3",
        "div yield": "3.9700%",
        "ex div date": "03/23/2015",
        "record date": "03/25/2015",
        "pay date": "03/27/2015",
        "next payout": "0.25"
    },
    {
        "symbol": "FMB",
        "annualized div": "1.38",
        "div yield": "2.6600%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.115"
    },
    {
        "symbol": "TYG-C",
        "annualized div": "0.4",
        "div yield": "3.9100%",
        "ex div date": "04/13/2015",
        "record date": "04/15/2015",
        "pay date": "05/01/2015",
        "next payout": "0.032917"
    },
    {
        "symbol": "LQDH",
        "annualized div": "2.9349",
        "div yield": "3.0400%",
        "ex div date": "03/03/2015",
        "record date": "03/05/2015",
        "pay date": "03/09/2015",
        "next payout": "0.244578"
    },
    {
        "symbol": "IBDF",
        "annualized div": "0.6807",
        "div yield": "0.6800%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.056721"
    },
    {
        "symbol": "IBDH",
        "annualized div": "1.5703",
        "div yield": "1.5500%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.130861"
    },
    {
        "symbol": "STIP",
        "annualized div": "2.83",
        "div yield": "2.8500%",
        "ex div date": "09/02/2014",
        "record date": "09/04/2014",
        "pay date": "09/08/2014",
        "next payout": "0.085629"
    },
    {
        "symbol": "SUBD",
        "annualized div": "1.1471",
        "div yield": "4.4300%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.09559"
    },
    {
        "symbol": "ENRJ-",
        "annualized div": "3.33",
        "div yield": "39.2700%",
        "ex div date": "03/12/2015",
        "record date": "03/16/2015",
        "pay date": "03/31/2015",
        "next payout": "0.208333"
    },
    {
        "symbol": "IBMG",
        "annualized div": "0.2863",
        "div yield": "1.1200%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.023859"
    },
    {
        "symbol": "IBMH",
        "annualized div": "0.3186",
        "div yield": "1.2500%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.026552"
    },
    {
        "symbol": "FMLP",
        "annualized div": "5.3424",
        "div yield": "21.7600%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/23/2015",
        "next payout": "0.4452"
    },
    {
        "symbol": "FTSM",
        "annualized div": "0.24",
        "div yield": "0.400%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.02"
    },
    {
        "symbol": "THQ",
        "annualized div": "1.35",
        "div yield": "6.5300%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/31/2015",
        "next payout": "0.1125"
    },
    {
        "symbol": "FDIV",
        "annualized div": "1.92",
        "div yield": "3.8300%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.16"
    },
    {
        "symbol": "NXJ-C",
        "annualized div": "0.14",
        "div yield": "1.400%",
        "ex div date": "01/13/2015",
        "record date": "01/15/2015",
        "pay date": "02/02/2015",
        "next payout": "0.016667"
    },
    {
        "symbol": "HDLV",
        "annualized div": "2.7444",
        "div yield": "10.2400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "03/23/2015",
        "next payout": "0.2252"
    },
    {
        "symbol": "YUMA-A",
        "annualized div": "2.31",
        "div yield": "12.200%",
        "ex div date": "03/16/2015",
        "record date": "03/18/2015",
        "pay date": "04/01/2015",
        "next payout": "0.192708"
    },
    {
        "symbol": "HIPS",
        "annualized div": "1.29",
        "div yield": "6.4200%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/20/2015",
        "next payout": "0.1075"
    },
    {
        "symbol": "CDC",
        "annualized div": "1.0405",
        "div yield": "2.8500%",
        "ex div date": "04/21/2015",
        "record date": "04/23/2015",
        "pay date": "04/24/2015",
        "next payout": "0"
    },
    {
        "symbol": "WBIE",
        "annualized div": "0.1634",
        "div yield": "0.6400%",
        "ex div date": "03/17/2015",
        "record date": "03/19/2015",
        "pay date": "03/20/2015",
        "next payout": "0.0136162"
    },
    {
        "symbol": "IBMI",
        "annualized div": "0.3002",
        "div yield": "1.1900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.025018"
    },
    {
        "symbol": "BSCN",
        "annualized div": "0.3936",
        "div yield": "1.8900%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0328"
    },
    {
        "symbol": "BSCO",
        "annualized div": "0.4308",
        "div yield": "2.0700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0359"
    },
    {
        "symbol": "BSJL",
        "annualized div": "1.1772",
        "div yield": "4.700%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0981"
    },
    {
        "symbol": "BSJM",
        "annualized div": "0.7764",
        "div yield": "3.100%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.0647"
    },
    {
        "symbol": "CBON",
        "annualized div": "0.528",
        "div yield": "2.1600%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/06/2015",
        "next payout": "0.044"
    },
    {
        "symbol": "CHNB",
        "annualized div": "2.11",
        "div yield": "5.6400%",
        "ex div date": "03/02/2015",
        "record date": "03/04/2015",
        "pay date": "03/11/2015",
        "next payout": "0.205"
    },
    {
        "symbol": "FBND",
        "annualized div": "1.44",
        "div yield": "2.8400%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/02/2015",
        "next payout": "0.12"
    },
    {
        "symbol": "FCOR",
        "annualized div": "1.524",
        "div yield": "3.00%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/02/2015",
        "next payout": "0.127"
    },
    {
        "symbol": "JGH",
        "annualized div": "1.584",
        "div yield": "9.2400%",
        "ex div date": "03/11/2015",
        "record date": "03/13/2015",
        "pay date": "04/01/2015",
        "next payout": "0.132"
    },
    {
        "symbol": "FEMB",
        "annualized div": "2.4",
        "div yield": "5.3300%",
        "ex div date": "03/25/2015",
        "record date": "03/27/2015",
        "pay date": "03/31/2015",
        "next payout": "0.2"
    },
    {
        "symbol": "KCNY",
        "annualized div": "0.94",
        "div yield": "2.7200%",
        "ex div date": "02/24/2015",
        "record date": "02/26/2015",
        "pay date": "02/27/2015",
        "next payout": "0.078549"
    },
    {
        "symbol": "FLTB",
        "annualized div": "0.564",
        "div yield": "1.1200%",
        "ex div date": "03/27/2015",
        "record date": "03/31/2015",
        "pay date": "04/02/2015",
        "next payout": "0.047"
    }
]
</script>
  <script>
    // getting JSON from the document works, but of what use is that?
  $(document).ready( function() {
    $('#local').dynatable({
       table: {
    defaultColumnIdStyle: 'lowercase'
    },
      dataset: {
        records: JSON.parse($('#music').text())
      }
    });
  });
  </script>
  <tbody>
  </tbody>
</table>
<hr style="width: 100%; color: #3A3F50; height: 1px; background-color:#3A3F50;" />

 <p class="font-thin"> Note: All of these stocks are not contained in our database. If you aren't able to find the symbol it simply means there is insufficient data.</p>

</div>
</div>
          <?php include 'right_column.php'; ?>
        </div>
      </div>
      <!-- / content -->

    </div>

    <script src="js/ui-load.js"></script>
    <script src="js/ui-jp.config.js"></script>
    <script src="js/ui-jp.js"></script>
    <script src="js/ui-nav.js"></script>
    <script src="js/ui-toggle.js"></script>

  </body>
  </html>
