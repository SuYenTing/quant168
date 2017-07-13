<?php
include("navbar.html");
?>
<html>

<head>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
</head>
<style>
.zc-ref {
    display: none;
}
.container {
    width: 80%;
}
</style>

<body>
<div class="container">
    <div id='myChart'></div>
</div>
</body>
<script type="text/javascript">
//zingchart.THEME = "classic";
var myConfig = {
    "type": "bubble",
    
    //"background-color": "#f4f4f4 #dfdfdf",
    "legend": {
        //"background-color": "#ffe6e6",
        "border-width": 2,
        //"border-color": "red",
        "border-radius": "5px",
        "padding": "10%",
        //"layout": "5x1",
        "x": "82%",
        "y": "25%",
    },
    "title": {
        "text": "泡泡圖",
        "background-color": "#777e88 #4e5665",
        "border-bottom": "1px solid #050505",
        "height": "50px",
        "font-color": "#fff",
        "font-family": "Arial",
        "font-weight": "normal",
        "font-size": "18px",
    },
    "plotarea": {
        "margin-right":"25%",
        "background-color": "#fff",
        "alpha": 0.1,
        //"margin": "90px 40px 50px 50px"
    },
    "scale-y": {
        "values": "0:20:5",
        "line-color": "#aaadb3",
        "shadow": 0,
        "tick": {
            "line-color": "#aaadb3"
        },
        "minor-ticks": 1,
        "minor-tick": {
            "visible": false,
            "line-color": "#aaadb3",
            "shadow": 0
        },
        "guide": {
            "line-color": "#aaadb3",
            "alpha": 0.3,
            "line-style": "solid"
        },
        "minor-guide": {
            "line-color": "#aaadb3",
            "alpha": 0.2,
            "line-style": "dashed"
        },
        "item": {
            "padding-right": "5px",
            "font-family": "Arial",
            "font-size": "11px",
            "font-color": "#676b72"
        }
    },
    "scale-x": {
        "line-color": "#aaadb3",
        "shadow": 0,
        "tick": {
            "line-color": "#aaadb3"
        },
        "minor-ticks": 1,
        "minor-tick": {
            "visible": false,
            "line-color": "#aaadb3",
            "shadow": 0
        },
        "guide": {
            "line-color": "#aaadb3",
            "alpha": 0.3,
            "line-style": "solid"
        },
        "minor-guide": {
            "line-color": "#aaadb3",
            "alpha": 0.2,
            "line-style": "dashed"
        },
        "item": {
            "padding-top": "5px",
            "font-family": "Arial",
            "font-size": "11px",
            "font-color": "#676b72"
        }
    },
    "tooltip": {
        "text": "這是測試資料<br>A lot of TEXT <br> Y-Axis Value: %v0<br>X-Axis Value: %v1<br>Bubble Size: %v2",
        "text-align": "left"
    },
    "series": [{
        "text":"Test 1",
        "values": [
            [
                1.3,
                15.2,
                8
            ],
            [
                2,
                4,
                2
            ],
            [
                5,
                10,
                1
            ],
            [
                6,
                3,
                3
            ],
            [
                3,
                6,
                2
            ],
            [
                7,
                15,
                10
            ],
            [
                8,
                2,
                4
            ],
            [
                0.1,
                6,
                6
            ],
            [
                2,
                12,
                3
            ],
            [
                4,
                4,
                4
            ],
            [
                5,
                1,
                5
            ],
            [
                6,
                0,
                1
            ],
            [
                8,
                16,
                2
            ]
        ],
        "marker": {
            "background-color": "#b2bf77 #829550",
            "border-width": "1px",
            "border-color": "#728440",
            "fill-type": "linear",
            "shadow": true,

        },
        "hover-marker": {
            "background-color": "#d2d9af #b2bf77",
            "border-color": "#a1ae64",
            "border-width": "1px"
        },
    }, {
        "text":"Test 2",
        "values": [
            [
                3,
                5,
                1
            ],
            [
                2,
                17,
                2
            ],
            [
                8,
                8,
                3
            ],
            [
                4,
                6,
                2
            ],
            [
                7,
                3.3,
                5
            ],
            [
                2,
                12,
                1
            ],
            [
                1,
                0.28,
                3
            ],
            [
                6,
                2,
                2
            ],
            [
                4,
                12,
                7
            ],
            [
                6,
                14,
                2
            ],
            [
                2,
                6.79,
                2
            ]
        ],
        "marker": {
            "background-color": "#9d9ad1 #615faa",
            "border-width": "1px",
            "border-color": "#514f99",
            "fill-type": "linear",
            "shadow": true,

        },
        "hover-marker": {
            "background-color": "#c3c2e3 #9d9ad1",
            "border-color": "#8a87c2",
            "border-width": "1px"
        }
    }, {
        "text":"Test 3",
        "values": [
            [
                3,
                6,
                5
            ],
            [
                6,
                8,
                8
            ],
            [
                8,
                12,
                5
            ],
            [
                3,
                2,
                3
            ],
            [
                5,
                5.69,
                2
            ],
            [
                7,
                10,
                2
            ],
            [
                2,
                1,
                1
            ],
            [
                7,
                4,
                1
            ],
            [
                6,
                17,
                4
            ],
            [
                1,
                9,
                3
            ],
            [
                5,
                14,
                1
            ]
        ],
        "marker": {
            "background-color": "#ecd466 #e0b140",
            "border-width": "1px",
            "border-color": "#cb9f34",
            "fill-type": "linear",
            "shadow": true,
        },
        "hover-marker": {
            "background-color": "#f9f0c8 #ecd466",
            "border-color": "#d5bc4c",
            "border-width": "1px"
        }
    }]
};

zingchart.render({
    id: 'myChart',
    data: myConfig,
    height: "700",
    width: "1000"
});
</script>

</html>
