/**
 * Created by yanbw on 2016/7/24.
 */
var myChart = echarts.init(document.getElementById('bar'));
// 显示标题，图例和空的坐标轴
myChart.setOption({
    title: {
        text: '订单数量统计'
    },
    tooltip: {},
    legend: {
        data:['新增订单数']
    },
    toolbox: {
        show: true,
        feature: {
            magicType: {type: ['line', 'bar']},
        }
    },
    xAxis: {
        data: []
    },
    yAxis: {},
    series: [{
        name: '新增订单数',
        type: 'bar',
        data: []
    }]
});
myChart.showLoading();
$.get('/index.php/Super/HistoryOrder/getBarData').done(function (data) {
    myChart.hideLoading();
    myChart.setOption({
        xAxis: {
            data: data.time
        },
        series: [{
            // 根据名字对应到相应的系列
            name: '新增订单数',
            data: data.orderCount
        }]
    });
});
$('#change_time').on('change',function(){
    var time = $(this).val();
    myChart.showLoading();
    $.get('/index.php/Super/HistoryOrder/getBarData/time/'+time).done(function (data) {
        myChart.hideLoading();
        myChart.setOption({
            xAxis: {
                data: data.time
            },
            series: [{
                // 根据名字对应到相应的系列
                name: '新增订单数',
                data: data.orderCount
            }]
        });
    });
})

$('#change_month').on('change',function(){
    var month = $(this).val();
    myChart.showLoading();
    $.get('/index.php/Super/HistoryOrder/getMonth/month/'+month).done(function (data) {
        myChart.hideLoading();
        myChart.setOption({
            xAxis: {
                data: data.time
            },
            series: [{
                // 根据名字对应到相应的系列
                name: '新增订单数',
                data: data.orderCount
            }]
        });
    });
})


