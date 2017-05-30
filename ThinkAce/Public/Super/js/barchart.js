var myChart = echarts.init(document.getElementById('bar'));
// 显示标题，图例和空的坐标轴
myChart.setOption({
    title: {
        text: '注册会员数量统计'
    },
    tooltip: {},
    legend: {
        data:['新增会员数']
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
        name: '新增会员数',
        type: 'bar',
        data: []
    }]
});
myChart.showLoading();

$.get('/index.php/Super/Member/getBarData').done(function (data) {

    myChart.hideLoading();
    myChart.setOption({
        xAxis: {
            data: data.time
        },
        series: [{
            // 根据名字对应到相应的系列
            name: '新增会员数',
            data: data.userCount
        }]
    });
});
$('#change_time').on('change',function(){
    var time = $(this).val();
    myChart.showLoading();

    $.get('/index.php/Super/Member/getBarData/time/'+time).done(function (data) {

        myChart.hideLoading();
        myChart.setOption({
            xAxis: {
                data: data.time
            },
            series: [{
                // 根据名字对应到相应的系列
                name: '新增会员数',
                data: data.userCount
            }]
        });
    });
})

$('#change_month').on('change',function(){
    var month = $(this).val();
    myChart.showLoading();

    $.get('/index.php/Super/Member/getMonth/month/'+month).done(function (data) {

        myChart.hideLoading();
        myChart.setOption({
            xAxis: {
                data: data.time
            },
            series: [{
                // 根据名字对应到相应的系列
                name: '新增会员数',
                data: data.userCount
            }]
        });
    });
})


