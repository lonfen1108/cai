@extends('layouts.app')

@section('htmlheader_title')
    Trade
@endsection

@section('self-style')
    <link href="/css/jquery.marquee.css" type="text/css" rel="stylesheet" media="all">
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
@endsection

@section('main-content')
    <!-- banner -->
    <div class="inner-banner-agileits-w3layouts">
    </div>
    <!-- //banner -->
    <!-- breadcrumbs -->
    <div class="w3l_agileits_breadcrumbs">
        <div class="container">
            {{--<div class="w3l_agileits_breadcrumbs_inner">--}}
                {{--<ul id="newsMarquee" class="marquee">--}}
                    {{--<li>上证指数：<span id="shangzheng">3154.66 ↑2.47 0.08% 1831.96亿元 (涨:749 平:212 跌:417)</span></li>--}}
                    {{--<li>深证成指：<span id="shangzheng">10234.65 ↑5.46 0.05% 2332.86亿元(涨:1175 平:309 跌:585)</span></li>--}}
                    {{--<li>创业板指：<span id="chuangye"></span></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- Index diagram -->
    <div class="gallery w3-agileits">
        <div class="container">
            {{--<div class="trade">--}}
                {{--<!-- inta-day data -->--}}
                {{--<div id="chartdiv"></div>--}}
                {{--<!-- //inta-day data -->--}}
                {{--<div class="clearfix"></div>--}}
            {{--</div>--}}
            <div class="sh000001" style="margin: 0 auto;text-align: center">
                <div class="textLable">{{$today_data}}总奖金池</div>
                <div class="totalMoney">
                    <img src="/images/gold.jpg" width="32"><span>{{$total_money}}</span>
                </div>
                <div class="proportion" style="width: 500px">
                    <span style="display: inline">看涨</span>
                    <div class="progress" style="display: inline">
                        <div class="progress-bar progress-bar-danger" style="width: 71%">
                            <span class="sr-only">up</span>
                        </div>
                        <div class="progress-bar progress-bar-success" style="width: 29%">
                            <span class="sr-only">down</span>
                        </div>
                    </div>
                    <span style="display: inline">看跌</span>
                    <div class="clearfix"></div>
                </div>
                <div class="textLable">
                    <span>{{$up_prop}}</span><span>VS</span><span>{{$down_prop}}</span>
                </div>
                <div class="profit">
                    <span>{{$up_profit}}</span><span>收益比</span><span>{{$down_profit}}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- //Index diagram -->

@endsection


@section('self-script')
    <script src="/js/lib/amcharts.js"></script>
    <script src="/js/lib/serial.js"></script>
    <script src="/js/lib/amstock.js"></script>
    <script src="/js/lib/none.js"></script>
    <script src="/js/jquery.marquee.js"></script>

    <!-- Chart code -->
    <script>

        $.ajax({
            url: "https://gupiao.baidu.com/api/stocks/stocktimeline?from=pc&os_ver=1&cuid=xxx&vv=100&format=json&stock_code=sh000001",
            timeout: 10000,
            jsonpCallback: "showPrice",
            jsonp: "callback",
            dataType: "jsonp",
            async: false,
            type: "GET",
            beforeSend: function () {
            },
            success: function (res) {
                var chartData = generateChartData(res);

                var chart = AmCharts.makeChart("chartdiv", {
                    "type": "stock",
                    "theme": "none",
                    "categoryAxesSettings": {
                        "minPeriod": "mm",
                        "maxSeries": 0,
                        "parseDates": true,
                        "equalSpacing": true,
                        "autoWrap": true
                    },

                    "dataSets": [{
                        "color": "#669def",
                        "fieldMappings": [{
                            "fromField": "value",
                            "toField": "value"
                        }, {
                            "fromField": "range",
                            "toField": "range"
                        }, {
                            "fromField": "volume",
                            "toField": "volume"
                        }, {
                            "fromField": "money",
                            "toField": "money"
                        }],

                        "dataProvider": chartData,
                        "categoryField": "date"
                    }],

                    "panels": [{
                        "showCategoryAxis": true,
                        "title": "上证指数",
                        "percentHeight": 70,
                        "valueAxes": [{
                            "id": "v1",
                            "position": "left",
                            "dashLength": 5
                        }, {
                            "id": "v2",
                            "unit": "%",
                            "position": "right",
                            "gridAlpha": 0
                        }, {
                            "id": "v3",
                            "gridAlpha": 0,
                            "labelsEnabled": false
                        }],
                        "categoryAxis": {
                            "dashLength": 5
                        },

                        "stockGraphs": [{
                            "title": "指数：",
                            "id": "g1",
                            "valueAxis": "v1",
                            "valueField": "value",
                            "type": "smoothedLine",
                            "lineThickness": 1,
                            "visibleInLegend": false,
                            "bullet": "round",
                            "bulletSize": 1,
                            "balloonText": "上证指数：<b>[[value]]</b>"
                        },
                            {
                                "title": "涨跌幅：",
                                "id": "g2",
                                "valueAxis": "v2",
                                "valueField": "range",
                                "type": "smoothedLine",
                                "lineThickness": 0,
                                "visibleInLegend": false,
                                "balloonText": "涨跌幅：<b>[[range]]</b> %"
                            },
                            {
                                "title": "成交额：",
                                "id": "g3",
                                "valueAxis": "v3",
                                "valueField": "money",
                                "type": "smoothedLine",
                                "lineThickness": 0,
                                "visibleInLegend": false,
                                "balloonText": "成交额：<b>[[money]]</b> 万元",
                                "showBalloon": true,
                                "hidden": false

                            }],

                        "stockLegend": {
                            "valueTextRegular": " ",
                            "markerType": "none"
                        }
                    }, {
                        "title": "成交量(万手)",
                        "percentHeight": 30,
                        "stockGraphs": [{
                            "valueField": "volume",
                            "type": "column",
                            "cornerRadiusTop": 2,
                            "fillAlphas": 1,
                            "balloonText": "成交量：<b>[[volume]]</b> 万手"
                        }],

                        "stockLegend": {
                            "valueTextRegular": " ",
                            "markerType": "none"
                        }
                    }],

                    "chartScrollbarSettings": {
                        "graph": "g1",
                        "usePeriod": "10mm",
                        "position": "top",
                        "enabled": false
                    },

                    "chartCursorSettings": {
                        "valueBalloonsEnabled": true,
                        "valueLineEnabled": true,
                        "zoomable": false
                    },

                    "panelsSettings": {
                        "usePrefixes": false,
                        "thousandsSeparator": ""
                    },

                    "export": {
                        "enabled": false,
                        "position": "bottom-right"
                    }
                });
            },
            complete: function (XMLHttpRequest, status) {
                if (status == 'success') {
                }
                else if (status == 'timeout') {
                }
                else {
                }
            }
        });

        function generateChartData(res) {
            var chartData = [];

            var cDate = new Date();
            var cYear = cDate.getFullYear();
            var cMonth = cDate.getMonth();
            var cDay = cDate.getDate();

            var firstDate = new Date(cYear, cMonth, cDay);
            firstDate.setDate(firstDate.getDate());
            firstDate.setHours(0, 0, 0, 0);

            var timeLine = res.data.timeline.timeline;
            var len = timeLine.length;
            len = len - 15;
            var lasttime = 0;
            var lastprice = 0;
            var lastamount = 0;

            for (var i = 0; i < 241; i++) {
                var minute;
                var price;
                var amount;
                var range;
                var money;

                if (i <= len - 1) {
                    //数据已产生
                    var index = i + 15;
                    var time = timeLine[index].values[2];//time
                    price = timeLine[index].values[4];//price
                    amount = timeLine[index].values[5];//amount 量
                    range = timeLine[index].values[8];//range
                    money = timeLine[index].values[10];//money 额

                    time = time.toFixed(4);
                    var hh = "";
                    var mm = "";
                    if (time.substr(0, 1) == '9') {
                        hh = time.substr(0, 1);
                        mm = time.substr(1, 2);
                    }
                    else {
                        hh = time.substr(0, 2);
                        mm = time.substr(2, 2);
                    }

                    minute = (Number(hh) - 9) * 60 + Number(mm);

                    price = price.toFixed(2);
                    amount = amount / 100;
                    amount = amount / 10000;
                    amount = amount.toFixed(2);
                    range = range.toFixed(2);
                    money = money / 10000;
                    money = money.toFixed(0);

                    if (i == len - 1) {
                        lasttime = minute;
                        lastprice = price;
                        lastamount = amount;
                    }

                }
                else {
                    lasttime = lasttime + 1;
                    minute = lasttime;
                    price = lastprice;
                    amount = lastamount;
                    range = 0;
                    money = 0;
                }


                var newDate = new Date(firstDate);
                //console.log(mm);
                newDate.setHours(9, minute, 0, 0);

                var a = Math.round(Math.random() * ( 40 + i )) + 100 + i;
                var b = Math.round(Math.random() * 100000000);

                chartData.push({
                    "date": newDate,
                    "value": price,
                    "range": range,
                    "volume": amount,
                    "money": money
                });
            }
            return chartData;
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#newsMarquee").marquee({
                pauseSpeed: 5000
            });
        });
    </script>
@endsection