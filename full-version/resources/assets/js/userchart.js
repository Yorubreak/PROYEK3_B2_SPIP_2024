/**
 * Charts Apex
 */

'use strict';

(function () {
  let cardColor, headingColor, labelColor, borderColor, legendColor;

  if (isDarkStyle) {
    cardColor = config.colors_dark.cardColor;
    headingColor = config.colors_dark.headingColor;
    labelColor = config.colors_dark.textMuted;
    legendColor = config.colors_dark.bodyColor;
    borderColor = config.colors_dark.borderColor;
  } else {
    cardColor = config.colors.cardColor;
    headingColor = config.colors.headingColor;
    labelColor = config.colors.textMuted;
    legendColor = config.colors.bodyColor;
    borderColor = config.colors.borderColor;
  }

  // Color constant
  const chartColors = {
    donut: {
      series1: '#FFC107',
      series2: '#03A9F4',
      series3: '#7367F0',
      series4: '#28C76F'
    }
  };

  // Bobot Komponen Chart
  // --------------------------------------------------------------------
  const bobotKomponenEl = document.querySelector('#donutChart1'),
    bobotKomponenConfig = {
      chart: {
        height: 350,
        type: 'donut'
      },
      labels: ['Penetapan Tujuan', 'Struktur dan Proses', 'Pencapaian Tujuan'],
      series: [40, 30, 30],
      colors: [
        chartColors.donut.series1,
        chartColors.donut.series2,
        chartColors.donut.series3
      ],
      stroke: {
        show: false
      },
      dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      legend: {
        show: true,
        position: 'bottom',
        labels: {
          colors: legendColor,
          useSeriesColors: false
        }
      },
      plotOptions: {
        pie: {
          donut: {
            labels: {
              show: true,
              name: {
                fontSize: '22px',
                fontFamily: 'Helvetica, Arial, sans-serif',
                fontWeight: 600,
                color: undefined,
                offsetY: -10
              },
              value: {
                fontSize: '16px',
                fontFamily: 'Helvetica, Arial, sans-serif',
                fontWeight: 400,
                color: undefined,
                offsetY: 16,
                formatter: function (val) {
                  return val + '%';
                }
              },
              total: {
                show: true,
                showAlways: true,
                label: 'Total',
                fontSize: '22px',
                fontFamily: 'Helvetica, Arial, sans-serif',
                fontWeight: 600,
                color: headingColor,
                formatter: function (w) {
                  return '100%';
                }
              }
            }
          }
        }
      },
      responsive: [
        {
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }
      ]
    };
  if (typeof bobotKomponenEl !== undefined && bobotKomponenEl !== null) {
    const bobotKomponenChart = new ApexCharts(bobotKomponenEl, bobotKomponenConfig);
    bobotKomponenChart.render();
  }

  // Nilai Maturitas Chart
  // --------------------------------------------------------------------
  const nilaiMaturitasEl = document.querySelector('#donutChart2'),
    nilaiMaturitasConfig = {
      series: [60],
      chart: {
        height: 350,
        type: 'radialBar',
      },
      plotOptions: {
        radialBar: {
          hollow: {
            size: '70%',
          },
          dataLabels: {
            name: {
              offsetY: -10,
              show: true,
              color: '#888',
              fontSize: '13px'
            },
            value: {
              color: '#111',
              fontSize: '30px',
              show: true,
            }
          }
        }
      },
      labels: ['Nilai'],
      colors: [chartColors.donut.series1],
    };
  if (typeof nilaiMaturitasEl !== undefined && nilaiMaturitasEl !== null) {
    const nilaiMaturitasChart = new ApexCharts(nilaiMaturitasEl, nilaiMaturitasConfig);
    nilaiMaturitasChart.render();
  }

  // Generated Leads Charts
  // --------------------------------------------------------------------
  const generatedLeadsConfig = {
    chart: {
      height: 160,
      type: 'donut'
    },
    labels: [''],
    series: [44, 55, 41, 17],
    colors: [
      chartColors.donut.series1,
      chartColors.donut.series2,
      chartColors.donut.series3,
      chartColors.donut.series4
    ],
    dataLabels: {
      enabled: false
    },
    legend: {
      show: false
    },
    plotOptions: {
      pie: {
        donut: {
          size: '75%',
          labels: {
            show: true,
            name: {
              show: false
            },
            value: {
              show: true,
              fontSize: '22px',
              fontFamily: 'Helvetica, Arial, sans-serif',
              fontWeight: 600,
              color: undefined,
              offsetY: -10,
            },
            total: {
              show: true,
              label: 'Total',
              color: headingColor,
              formatter: function (w) {
                return '184'
              }
            }
          }
        }
      }
    },
    responsive: [
      {
        breakpoint: 426,
        options: {
          chart: {
            height: 147
          }
        }
      }
    ]
  };

  const generatedLeadsElements = [
    document.querySelector('#generatedLeadsChart1'),
    document.querySelector('#generatedLeadsChart2'),
    document.querySelector('#generatedLeadsChart3')
  ];

  generatedLeadsElements.forEach((el, index) => {
    if (typeof el !== undefined && el !== null) {
      const chart = new ApexCharts(el, generatedLeadsConfig);
      chart.render();
    }
  });
})();
