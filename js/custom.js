




function updateSmtChart(trkidx,method) {

    var options = {
        chart: {
            renderTo: 'containerSmt',
            type: 'line'
        },
        style: {
            fontFamily: 'cwTeXKai',

        },

        title: {
            text: '智慧指數追蹤',
            //x: -20 //center
        },
        subtitle: {
            text: '',
        },

        xAxis: {
            categories: [],
            tickInterval:12,

            title: {
                text: '日期',
                offset:50,
            },
            labels: {
                style: {

                    fontSize:'15px'
                }
            }
        },
        yAxis: {
            title: {
                text: '累積報酬率'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },plotOptions: {
            line: {
                marker: {
                    enabled: false
                }
            }
        },exporting: { enabled: false },

        legend: {
            layout: 'horizontal',
          //  floating:'true',
            //align: 'right',
           // verticalAlign: 'middle',
            borderWidth: 0,
            itemStyle: {
                fontSize:'15px',


            },
        },
        series: []
    };
    $.getJSON("/data/DrawSmtChart.php",{trkidx:trkidx,method:method}, function (json) {
        options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
        options.series[0] = json[1];
        options.series[1] = json[2];
        options.series[2] = json[3];
        options.series[3] = json[4];
        options.series[4] = json[5];
        chart = new Highcharts.Chart(options);
        chart.reflow();
    });


}



$(document).ready(function(){
    updateSmtChart('A50','equity');

});





function updateSmt(trkidx,method){

    //alert(trackidx);alert(method);

    if(method==0)
    {
        updateSmtChart(trkidx,method);

        $.ajax({
            url:"/data/updateSmt.php",
            timeout:30000,
            method:"POST",
            data:{trkidx:trkidx,method:0},
            success:function(data)
            {
                $('#smt_tbl_1').html(data);
            }
        });
    }
    else
    {

        $.ajax({
            url:"/data/updateSmt.php",
            timeout:30000,
            method:"POST",
            data:{trkidx:trkidx,method:method},
            success:function(data)
            {
                $('#smt_tbl_2').html(data);
            }
        });
    }

}




