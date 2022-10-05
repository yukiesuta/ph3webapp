"use strict";

const modal_open = document.getElementById("open");
const modal_open_resp = document.getElementById("open_resp");
const modal_close = document.getElementById("close");
const modal = document.getElementById("modal");
const mask = document.getElementById("mask");
const post = document.getElementById("posting");
const load = document.getElementById("loading");
const m_top = document.getElementById("m_top");

function showModal() {
    modal.style.display = "block";
    mask.style.display = "block";
}

function modalClose() {
    modal.style.display = "none";
    mask.style.display = "none";
    load.style.display = "none";
}

document.getElementById("posting").onclick = function () {
    const textbox = document.getElementById("name2")
    const value = textbox.value

    const tweetUrl = "https://twitter.com/intent/tweet?text=" + value;
    console.log(tweetUrl)

    function tweetChecked() {
        open(tweetUrl);
        load.style.display = "none";
    }

    if (document.getElementById('check').checked) {
        load.style.display = "block";
        setTimeout(function () { tweetChecked() }, 2000);
    }
};

google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart);

let hour_time_datum = [
    ['date',
        { label: 'hour', type: 'number' }]
];

// 1日のみを取り出す、入ってない日付を入れるとエラーになる
for (let i = 1; i < 32; i++) {
    hour_time_datum.push([i, js_array[1]['hour']])
};

let options = {
    legend: { position: 'none' },

    vAxis: {
        format: '#h',
    },
    height: 600,

}
// グラフの描画   
function drawChart() {
    // 配列からデータの生成
    var data = google.visualization.arrayToDataTable(hour_time_datum);

    // 指定されたIDの要素に棒グラフを作成
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

    // グラフの描画
    chart.draw(data, options);
}

//円グラフ
var dataLabelPlugin = {
    afterDatasetsDraw: function (chart, easing) {
        var ctx = chart.ctx;

        chart.data.datasets.forEach(function (dataset, i) {
            var dataSum = 0;
            dataset.data.forEach(function (element) {
                dataSum += element;
            });

            var meta = chart.getDatasetMeta(i);
            if (!meta.hidden) {
                meta.data.forEach(function (element, index) {
                    ctx.fillStyle = 'rgb(255, 255, 255)';

                    var fontSize = 12;
                    var fontStyle = 'normal';
                    var fontFamily = 'Helvetica Neue';
                    ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                    var labelString = chart.data.labels[index];
                    var dataString = (Math.round(dataset.data[index] / dataSum * 1000) / 10).toString() + "%";

                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';

                    var padding = 5;
                    var position = element.tooltipPosition();
                    ctx.fillText(dataString, position.x, position.y + (fontSize / 2) - padding);
                });
            }
        });
    }
};

let language_datum = [];
for (let i = 0; i < 8; i++) {
    language_datum.push(study_languages_array[i].language)
};

let language_color_datum = [];
for (let i = 0; i < 8; i++) {
    language_color_datum.push(study_languages_array[i].color)
};

var ctx = document.getElementById("sircleGrafLanguages1");
var sircleGrafLanguages = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: language_datum, //データ項目のラベル
        datasets: [{
            backgroundColor: language_color_datum,
            data: study_hour_datum_array //グラフのデータ決めうち
        }]
    },
    options: {
        legend: { position: 'bottom' },
        maintainAspectRatio: false,
        responsive: true,
        layout: { //レイアウトの設定
            padding: {
                left: 30,
                right: 30,
                top: 0,
                bottom: 50
            }
        }
    },
    plugins: [dataLabelPlugin],
});

let study_contents_label_array = [];
for (let i = 0; i < 3; i++) {
    study_contents_label_array.push(study_contents_array[i].content)
};

let study_contents_background_color_array = [];
for (let i = 0; i < 3; i++) {
    study_contents_background_color_array.push(study_contents_array[i].color)
};

var ctx = document.getElementById("sircleGrafLanguages2");
var sircleGrafLanguages = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: study_contents_label_array, //データ項目のラベル
        datasets: [{
            backgroundColor: study_contents_background_color_array,
            data: study_contents_datum_array //グラフのデータ
        }]
    },
    options: {
        legend: { position: 'bottom' },
        maintainAspectRatio: false,
        responsive: true,
        layout: { //レイアウトの設定
            padding: {
                left: 30,
                right: 30,
                top: 0,
                bottom: 50
            }
        }
    },
    plugins: [dataLabelPlugin],
});
