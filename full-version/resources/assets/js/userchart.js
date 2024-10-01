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
    column: {
      series1: '#826af9',
      series2: '#d2b0ff',
      bg: '#f8d3ff'
    },
    donut: {
      series1: '#fee802',
      series2: '#3fd0bd',
      series3: '#826bf8',
      series4: '#2b9bf4'
    },
    area: {
      series1: '#29dac7',
      series2: '#60f2ca',
      series3: '#a5f8cd'
    }
  };

  // Donut Chart
  // --------------------------------------------------------------------
  const donutChartEl = document.querySelector('#donutChart1'),
    donutChartConfig = {
      chart: {
        height: 350,
        type: 'donut'
      },
      labels: ['Penetapan Tujuan', 'Struktur dan Proses', 'Pencapaian Tujuan'],
      series: [40, 30, 30],
      colors: [
        chartColors.donut.series1,
        chartColors.donut.series4,
        chartColors.donut.series3
      ],
      stroke: {
        show: false,
        curve: 'straight'
      },
      dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
          return parseInt(val, 10) + '%';
        }
      },
      legend: {
        show: true,
        position: 'bottom',
        markers: { offsetX: -3 },
        itemMargin: {
          vertical: 3,
          horizontal: 10
        },
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
                fontSize: '2rem',
                fontFamily: 'Public Sans'
              },
              value: {
                fontSize: '1.2rem',
                color: legendColor,
                fontFamily: 'Public Sans',
                formatter: function (val) {
                  return parseInt(val, 10) + '%';
                }
              },
              total: {
                show: true,
                fontSize: '1.2rem',
                color: headingColor,
                label: 'Total',
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
          breakpoint: 992,
          options: {
            chart: {
              height: 380
            },
            legend: {
              position: 'bottom',
              labels: {
                colors: legendColor,
                useSeriesColors: false
              }
            }
          }
        },
        {
          breakpoint: 576,
          options: {
            chart: {
              height: 320
            },
            plotOptions: {
              pie: {
                donut: {
                  labels: {
                    show: true,
                    name: {
                      fontSize: '1.5rem'
                    },
                    value: {
                      fontSize: '1rem'
                    },
                    total: {
                      fontSize: '1.5rem'
                    }
                  }
                }
              }
            },
            legend: {
              position: 'bottom',
              labels: {
                colors: legendColor,
                useSeriesColors: false
              }
            }
          }
        },
        {
          breakpoint: 420,
          options: {
            chart: {
              height: 280
            },
            legend: {
              show: false
            }
          }
        },
        {
          breakpoint: 360,
          options: {
            chart: {
              height: 250
            },
            legend: {
              show: false
            }
          }
        }
      ]
    };
  if (typeof donutChartEl !== undefined && donutChartEl !== null) {
    const donutChart = new ApexCharts(donutChartEl, donutChartConfig);
    donutChart.render();
  }

  const donutChartEl2 = document.querySelector('#donutChart2'),
  donutChartConfig2 = {
    chart: {
      height: 350,
      type: 'donut'
    },
    labels: ['Nilai Maturitas', ''],
    series: [60, 40],
    colors: [
      chartColors.donut.series1,
      '#fefbd6'
    ],
    tooltip: {
      enabled: false  // Menonaktifkan tooltip saat hover
    },

    stroke: {
      show: false,
      curve: 'straight'
    },
    dataLabels: {
      enabled: false,
      formatter: function (val, opt) {
        var scaledVal = (val / 100) * 5; // Mengubah skala dari 100 ke 5
        return scaledVal.toFixed(2);
      }
    },
    legend: {
      show: false,
      position: 'bottom',
      markers: { offsetX: -1 },
      itemMargin: {
        vertical: 3,
        horizontal: 10
      },
      onItemHover: {
        highlightDataSeries: true
      },
      labels: {
        colors: legendColor,
        useSeriesColors: false
      }
    },
    states: {
      hover: {
        filter: {
          type: 'none'
        }
      }
    },
    plotOptions: {
      pie: {
        donut: {
          labels: {
            show: true,
            name: {
              fontSize: '2rem',
              fontFamily: 'Public Sans'
            },
            value: {
              show: true,
              fontSize: '1.2rem',
              color: legendColor,
              fontFamily: 'Public Sans',
              formatter: function () {
                var series1Value = donutChartConfig2.series[0];  // Mengambil data dari series pertama
                var scaledVal = (series1Value / 100) * 5;  // Mengubah skala dari 100 ke 5
                return scaledVal.toFixed(2) + '/5.00';
              }
            },
            total: {
              tooltip: {
                enabled: false  // Menonaktifkan tooltip saat hover
              },
              show: true,
              showAlways: true,
              fontSize: '1.5rem',
              color: headingColor,
              label: 'Nilai',
              formatter: function () {
                var series1Value = donutChartConfig2.series[0];  // Mengambil data dari series pertama
                var scaledVal = (series1Value / 100) * 5;  // Mengubah skala dari 100 ke 5
                return scaledVal.toFixed(2) + '/5.00';
              }

            }
          }
        }
      }
    },
    responsive: [
      {
        breakpoint: 992,
        options: {
          chart: {
            height: 380
          },
          legend: {
            position: 'bottom',
            labels: {
              colors: legendColor,
              useSeriesColors: false
            }
          }
        }
      },
      {
        breakpoint: 576,
        options: {
          chart: {
            height: 320
          },
          plotOptions: {
            pie: {
              donut: {
                labels: {
                  show: true,
                  name: {
                    fontSize: '1.5rem'
                  },
                  value: {
                    fontSize: '1rem'
                  },
                  total: {
                    fontSize: '1.5rem'
                  }
                }
              }
            }
          },
          legend: {
            position: 'bottom',
            labels: {
              colors: legendColor,
              useSeriesColors: false
            }
          }
        }
      },
      {
        breakpoint: 420,
        options: {
          chart: {
            height: 280
          },
          legend: {
            show: false
          }
        }
      },
      {
        breakpoint: 360,
        options: {
          chart: {
            height: 250
          },
          legend: {
            show: false
          }
        }
      }
    ]
  };
  if (typeof donutChartEl2 !== undefined && donutChartEl2 !== null) {
    const donutChart = new ApexCharts(donutChartEl2, donutChartConfig2);
    donutChart.render();
  }

  // Generated Leads Chart
  // --------------------------------------------------------------------
  const generatedLeadsChartEl1 = document.querySelector('#generatedLeadsChart1'),
    generatedLeadsChartConfig1 = {
      chart: {
        height: 147,
        width: 130,
        parentHeightOffset: 0,
        type: 'donut'
      },
      labels: ['Electronic', 'Sports', 'Decor', 'Fashion'],
      series: [45, 58, 30, 50],
      colors: [
        chartColors.donut.series1,
        chartColors.donut.series2,
        chartColors.donut.series3,
        chartColors.donut.series4
      ],
      stroke: {
        width: 0
      },
      dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      legend: {
        show: false
      },
      tooltip: {
        theme: false
      },
      grid: {
        padding: {
          top: 15,
          right: -20,
          left: -20
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        }
      },
      plotOptions: {
        pie: {
          donut: {
            size: '70%',
            labels: {
              show: true,
              value: {
                fontSize: '1.375rem',
                fontFamily: 'Public Sans',
                color: headingColor,
                fontWeight: 500,
                offsetY: -15,
                formatter: function (val) {
                  return parseInt(val) + '%';
                }
              },
              name: {
                offsetY: 20,
                fontFamily: 'Public Sans'
              },
              total: {
                show: true,
                showAlways: true,
                color: config.colors.success,
                fontSize: '.8125rem',
                label: 'Total',
                fontFamily: 'Public Sans',
                formatter: function (w) {
                  return '184';
                }
              }
            }
          }
        }
      },
      responsive: [
        {
          breakpoint: 1025,
          options: {
            chart: {
              height: 172,
              width: 160
            }
          }
        },
        {
          breakpoint: 769,
          options: {
            chart: {
              height: 178
            }
          }
        },
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
  if (typeof generatedLeadsChartEl1 !== undefined && generatedLeadsChartEl1 !== null) {
    const generatedLeadsChart1 = new ApexCharts(generatedLeadsChartEl1, generatedLeadsChartConfig1);
    generatedLeadsChart1.render();
  }

  const generatedLeadsChartEl2 = document.querySelector('#generatedLeadsChart2'),
    generatedLeadsChartConfig2= {
      chart: {
        height: 147,
        width: 130,
        parentHeightOffset: 0,
        type: 'donut'
      },
      labels: ['Electronic', 'Sports', 'Decor', 'Fashion'],
      series: [45, 58, 30, 50],
      colors: [
        chartColors.donut.series1,
        chartColors.donut.series2,
        chartColors.donut.series3,
        chartColors.donut.series4
      ],
      stroke: {
        width: 0
      },
      dataLabels: {
        enabled: false,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      legend: {
        show: false
      },
      tooltip: {
        theme: false
      },
      grid: {
        padding: {
          top: 15,
          right: -20,
          left: -20
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        }
      },
      plotOptions: {
        pie: {
          donut: {
            size: '70%',
            labels: {
              show: true,
              value: {
                fontSize: '1.375rem',
                fontFamily: 'Public Sans',
                color: headingColor,
                fontWeight: 500,
                offsetY: -15,
                formatter: function (val) {
                  return parseInt(val) + '%';
                }
              },
              name: {
                offsetY: 20,
                fontFamily: 'Public Sans'
              },
              total: {
                show: true,
                showAlways: true,
                color: config.colors.success,
                fontSize: '.8125rem',
                label: 'Total',
                fontFamily: 'Public Sans',
                formatter: function (w) {
                  return '184';
                }
              }
            }
          }
        }
      },
      responsive: [
        {
          breakpoint: 1025,
          options: {
            chart: {
              height: 172,
              width: 160
            }
          }
        },
        {
          breakpoint: 769,
          options: {
            chart: {
              height: 178
            }
          }
        },
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
  if (typeof generatedLeadsChartEl2 !== undefined && generatedLeadsChartEl2 !== null) {
    const generatedLeadsChart2 = new ApexCharts(generatedLeadsChartEl2, generatedLeadsChartConfig2);
    generatedLeadsChart2.render();
  }

  const generatedLeadsChartEl3 = document.querySelector('#generatedLeadsChart3'),
    generatedLeadsChartConfig3= {
      chart: {
        height: 147,
        width: 130,
        parentHeightOffset: 0,
        type: 'donut'
      },
      labels: ['Electronic', 'Sports', 'Decor', 'Fashion'],
      series: [45, 58, 30, 50],
      colors: [
        chartColors.donut.series1,
        chartColors.donut.series2,
        chartColors.donut.series3,
        chartColors.donut.series4
      ],
      stroke: {
        width: 0
      },
      dataLabels: {
        enabled: false,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      legend: {
        show: false
      },
      tooltip: {
        theme: false
      },
      grid: {
        padding: {
          top: 15,
          right: -20,
          left: -20
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        }
      },
      plotOptions: {
        pie: {
          donut: {
            size: '70%',
            labels: {
              show: true,
              value: {
                fontSize: '1.375rem',
                fontFamily: 'Public Sans',
                color: headingColor,
                fontWeight: 500,
                offsetY: -15,
                formatter: function (val) {
                  return parseInt(val) + '%';
                }
              },
              name: {
                offsetY: 20,
                fontFamily: 'Public Sans'
              },
              total: {
                show: true,
                showAlways: true,
                color: config.colors.success,
                fontSize: '.8125rem',
                label: 'Total',
                fontFamily: 'Public Sans',
                formatter: function (w) {
                  return '184';
                }
              }
            }
          }
        }
      },
      responsive: [
        {
          breakpoint: 1025,
          options: {
            chart: {
              height: 172,
              width: 160
            }
          }
        },
        {
          breakpoint: 769,
          options: {
            chart: {
              height: 178
            }
          }
        },
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
  if (typeof generatedLeadsChartEl3 !== undefined && generatedLeadsChartEl3 !== null) {
    const generatedLeadsChart3 = new ApexCharts(generatedLeadsChartEl3, generatedLeadsChartConfig3);
    generatedLeadsChart3.render();
  }
})();





