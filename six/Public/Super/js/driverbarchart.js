var myChart = echarts.init(document.getElementById('bar'));
// 显示标题，图例和空的坐标轴
myChart.setOption({
    title: {
        text: '注册司机数量统计'
    },
    tooltip: {},
    legend: {
        data:['新增司机数']
    },
    toolbox: {
        show: true,
        feature: {
            magicType: {type: ['line', 'bar']}
        }
    },
    xAxis: {
        data: []
    },
    yAxis: {},
    series: [{
        name: '新增司机数',
        type: 'bar',
        data: []
    }]
});
myChart.showLoading();

$.get('/index.php/Super/ManagerDriver/getBarData').done(function (data) {

    myChart.hideLoading();
    myChart.setOption({
        xAxis: {
            data: data.time
        },
        series: [{
            // 根据名字对应到相应的系列
            name: '新增司机数',
            data: data.userCount
        }]
    });
});
$('#change_time').on('change',function(){
    var time = $(this).val();
    myChart.showLoading();

    $.get('/index.php/Super/ManagerDriver/getBarData/time/'+time).done(function (data) {

        myChart.hideLoading();
        myChart.setOption({
            xAxis: {
                data: data.time
            },
            series: [{
                // 根据名字对应到相应的系列
                name: '新增司机数',
                data: data.userCount
            }]
        });
    });
})

$('#change_month').on('change',function(){
    var month = $(this).val();
    myChart.showLoading();

    $.get('/index.php/Super/ManagerDriver/getMonth/month/'+month).done(function (data) {
        myChart.hideLoading();
        myChart.setOption({
            xAxis: {
                data: data.time
            },
            series: [{
                // 根据名字对应到相应的系列
                name: '新增司机数',
                data: data.userCount
            }]
        });
    });
})


