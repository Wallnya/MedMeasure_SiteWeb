var gradients = [
  {id: 'pink', start: '#b34f53', end: '#dd5b59'},
  {id: 'blue', start: '#095a82', end: '#0170a7'},
  {id: 'red', start: '#874d2a', end: '#a55724'},
  {id: 'green', start: '#5b7964', end: '#869d8d'},
  {id: 'aqua', start: '#3f6071', end: '#588094'},
  {id: 'other', start: '#2272ad', end: '#308cd0'}
];


data = [];
var pourcentage_femmes = document.getElementById("pourcentage_femmes").value - 0;
var pourcentage_hommes = document.getElementById("pourcentage_hommes").value - 0;
var score_tests_partiels_30 = document.getElementById("score_tests_partiels_30").value;
var score_tests_partiels_60 = document.getElementById("score_tests_partiels_60").value;
var score_tests_partiels_75 = 100 - score_tests_partiels_60 - score_tests_partiels_30;
var score_tests_complets_30 = document.getElementById("score_tests_complets_30").value;
var score_tests_complets_60 = document.getElementById("score_tests_complets_60").value;
var score_tests_complets_75 = 100 - score_tests_complets_60 - score_tests_complets_30;
var score_total_30 = document.getElementById("score_total_30").value;
var score_total_60 = document.getElementById("score_total_60").value;
var score_total_75 = 100 - score_total_30 - score_total_60;
  

data['piedata'] = [
  { label: "< 30", value: score_total_30, color: 'red' },
  { label: "< 60", value: score_total_60, color: 'other' },
  { label: " > 75", value: score_total_75, color: 'pink' }
];

data['piedata2'] = [
  { label: "Hommes", value: pourcentage_hommes, color: 'other' },
  { label: "Femmes", value: pourcentage_femmes, color: 'pink' }
];

data['piedata3'] = [
  { label: "< 30", value: score_tests_partiels_30, color: 'red' },
  { label: "< 60", value: score_tests_partiels_60, color: 'other' },
  { label: " > 75", value: score_tests_partiels_75, color: 'pink' }
];

data['piedata4'] = [
  { label: "< 30", value: score_tests_complets_30, color: 'red' },
  { label: "< 60", value: score_tests_complets_60, color: 'other' },
  { label: " > 75", value: score_tests_complets_75, color: 'pink' }
];

function change2(element) {

  delete data;
  data = [];

  var pourcentage_femmes = document.getElementById("pourcentage_femmes").value - 0;
  var pourcentage_hommes = document.getElementById("pourcentage_hommes").value - 0;
  var score_tests_partiels_30 = document.getElementById("score_tests_partiels_30").value;
  var score_tests_partiels_60 = document.getElementById("score_tests_partiels_60").value;
  var score_tests_partiels_75 = 100 - score_tests_partiels_60 - score_tests_partiels_30;
  var score_tests_complets_30 = document.getElementById("score_tests_complets_30").value;
  var score_tests_complets_60 = document.getElementById("score_tests_complets_60").value;
  var score_tests_complets_75 = 100 - score_tests_complets_60 - score_tests_complets_30;
  var score_total_30 = document.getElementById("score_total_30").value;
  var score_total_60 = document.getElementById("score_total_60").value;
  var score_total_75 = 100 - score_total_30 - score_total_60;
  
  var pourcentage_femmes_tests_partiels_30 = document.getElementById("pourcentage_femmes_tests_partiels_30").value;
  var pourcentage_femmes_tests_partiels_60 = document.getElementById("pourcentage_femmes_tests_partiels_60").value;
  var pourcentage_femmes_tests_partiels_75 = document.getElementById("pourcentage_femmes_tests_partiels_75").value;
  var pourcentage_femmes_tests_complets_30 = document.getElementById("pourcentage_femmes_tests_complets_30").value;
  var pourcentage_femmes_tests_complets_60 = document.getElementById("pourcentage_femmes_tests_complets_60").value;
  var pourcentage_femmes_tests_complets_75 = document.getElementById("pourcentage_femmes_tests_complets_75").value;
  var pourcentage_femmes_30 = document.getElementById("pourcentage_femmes_30").value;
  var pourcentage_femmes_60 = document.getElementById("pourcentage_femmes_60").value;
  var pourcentage_femmes_75 = document.getElementById("pourcentage_femmes_75").value;
  var pourcentage_hommes_tests_partiels_30 = document.getElementById("pourcentage_hommes_tests_partiels_30").value;
  var pourcentage_hommes_tests_partiels_60 = document.getElementById("pourcentage_hommes_tests_partiels_60").value;
  var pourcentage_hommes_tests_partiels_75 = document.getElementById("pourcentage_hommes_tests_partiels_75").value;
  var pourcentage_hommes_tests_complets_30 = document.getElementById("pourcentage_hommes_tests_complets_30").value;
  var pourcentage_hommes_tests_complets_60 = document.getElementById("pourcentage_hommes_tests_complets_60").value;
  var pourcentage_hommes_tests_complets_75 = document.getElementById("pourcentage_hommes_tests_complets_75").value;
  var pourcentage_hommes_30 = document.getElementById("pourcentage_hommes_30").value;
  var pourcentage_hommes_60 = document.getElementById("pourcentage_hommes_60").value;
  var pourcentage_hommes_75 = document.getElementById("pourcentage_hommes_75").value;



  if (element == 'Hommes') {
    data['piedata'] = [
      { label: "< 30", value: pourcentage_hommes_30, color: 'red' },
      { label: "< 60", value: pourcentage_hommes_60, color: 'other' },
      { label: " > 75", value: pourcentage_hommes_75, color: 'pink' }
    ];

    data['piedata2'] = [
      { label: "Hommes", value: pourcentage_hommes, color: 'other' },
      { label: "Femmes", value: pourcentage_femmes, color: 'pink' }
    ];
    
    data['piedata3'] = [
      { label: "< 30", value: pourcentage_hommes_tests_partiels_30, color: 'red' },
      { label: "< 60", value: pourcentage_hommes_tests_partiels_60, color: 'other' },
      { label: " > 75", value: pourcentage_hommes_tests_partiels_75, color: 'pink' }
    ];
    
    data['piedata4'] = [
      { label: "< 30", value: pourcentage_hommes_tests_complets_30, color: 'red' },
      { label: "< 60", value: pourcentage_hommes_tests_complets_60, color: 'other' },
      { label: " > 75", value: pourcentage_hommes_tests_complets_75, color: 'pink' }
    ];

  }
  else if (element == 'Femmes') {
    data['piedata'] = [
      { label: "< 30", value: pourcentage_femmes_30, color: 'red' },
      { label: "< 60", value: pourcentage_femmes_60, color: 'other' },
      { label: " > 75", value: pourcentage_femmes_75, color: 'pink' }
    ];

    data['piedata2'] = [
      { label: "Hommes", value: pourcentage_hommes, color: 'other' },
      { label: "Femmes", value: pourcentage_femmes, color: 'pink' }
    ];
    
    data['piedata3'] = [
      { label: "< 30", value: pourcentage_femmes_tests_partiels_30, color: 'red' },
      { label: "< 60", value: pourcentage_femmes_tests_partiels_60, color: 'other' },
      { label: " > 75", value: pourcentage_femmes_tests_partiels_75, color: 'pink' }
    ];
    
    data['piedata4'] = [
      { label: "< 30", value: pourcentage_femmes_tests_complets_30, color: 'red' },
      { label: "< 60", value: pourcentage_femmes_tests_complets_60, color: 'other' },
      { label: " > 75", value: pourcentage_femmes_tests_complets_75, color: 'pink' }
    ];

  }
  else if (element == "Sexe") {
    data['piedata'] = [
      { label: "< 30", value: score_total_30, color: 'red' },
      { label: "< 60", value: score_total_60, color: 'other' },
      { label: " > 75", value: score_total_75, color: 'pink' }
    ];
    
    data['piedata2'] = [
      { label: "Hommes", value: pourcentage_hommes, color: 'other' },
      { label: "Femmes", value: pourcentage_femmes, color: 'pink' }
    ];
    
    data['piedata3'] = [
      { label: "< 30", value: score_tests_partiels_30, color: 'red' },
      { label: "< 60", value: score_tests_partiels_60, color: 'other' },
      { label: " > 75", value: score_tests_partiels_75, color: 'pink' }
    ];
    
    data['piedata4'] = [
      { label: "< 30", value: score_tests_complets_30, color: 'red' },
      { label: "< 60", value: score_tests_complets_60, color: 'other' },
      { label: " > 75", value: score_tests_complets_75, color: 'pink' }
    ];
  }
    

    $(document).ready(function() {
      $('[data-pie]').each(function() {
        var chartId = '#' + $(this).attr('id');
        var chartLabel = $(this).attr('data-pie-label');
        var piedata = data[$(this).attr('data-pie')];
        
        var width = 300,
        height = 300,
        radius = 140;
    
        var pie = d3.layout.pie()
          .value(function(d) {
            return d.value;
          })
          .sort(null);
    
        var arc = d3.svg.arc()
          .outerRadius(radius)
          .innerRadius(radius / 1.5);
    
        var max = d3.max(piedata, function(d) { return +d.value;} );
    
        var myChart = d3.select(chartId).append('svg')
          .attr('width', width)
          .attr('height', height)
          .append('g')
            .attr('transform', 'translate('+ (width / 2) +', '+ (height / 2) +')')
            .selectAll('path').data(pie(piedata))
            .enter().append('g')
              .attr('class', function(d, i) {
                var cssClass = 'slice';
                if (d.data.value === max) {
                  cssClass += ' max';
                }
                return cssClass;
              });
    
        var gradient = d3.select(chartId + ' svg')
          .selectAll('linearGradient').data(gradients)
          .enter().append('linearGradient')
            .attr('id', function(d, i) {
              return gradients[i].id;
            });
    
        gradient.append('stop')
          .attr('offset', '0%')
          .attr('stop-color', function(d, i) {
            return gradients[i].start;
          });
    
        gradient.append('stop')
          .attr('offset', '100%')
          .attr('stop-color', function(d, i) {
            return gradients[i].end;
          });
    
        var slices = d3.selectAll(chartId + ' g.slice')
          .append('path')
            .attr('fill', function(d, i) {
              return 'url(#' + d.data.color + ')';
            })
            .attr('d', arc)
            .on('mouseover', function(d, i) {
              var gradient = gradients.filter(function( obj ) {
                return obj.id == d.data.color;
              });
              $(chartId + ' [data-slice]').css('opacity', 0.5);
              $(chartId + ' [data-slice=' + i + ']').css({
                'background': gradient[0].end,
                'opacity': 1
              });
            })
            .on('mouseout', function(d, i) {
              $(chartId + ' [data-slice]').css('opacity', 1);
              $(chartId + ' [data-slice=' + i + ']').css('background', 'rgba(0,0,0,0.2)');
            });
    
        var legend = d3.select(chartId)
          .attr('class', 'pie-chart')
          .append('ul')
            .attr('class', 'legend')
            .selectAll('li').data(pie(piedata))
            .enter().append('li')
              .attr('data-slice', function(d, i) {
                return i;
              })
              .attr('style', function(d, i) {
                var gradient = gradients.filter(function( obj ) {
                  return obj.id == d.data.color;
                });
                return 'border-bottom: solid 3px' + gradient[0].end;
              })
              .text(function(d, i) {
                return d.data.label + ': ';
              });
    
        legend.append('span')
          .text(function(d, i) {
          return d.data.value + '%';
        });
    
        var maxCirc = d3.select(chartId)
          .append('div')
          .attr('class', 'max-circ');
    
        maxCirc.append('span')
          .attr('class', 'label')
          .text(chartLabel);
    
        maxCirc.append('span')
          .attr('class', 'value')
          .attr('style', function() {
            var top = piedata.filter(function( obj ) {
              return obj.value == max;
            });
            var gradient = gradients.filter(function( obj ) {
              return obj.id == top[0].color;
            });
            return 'color: ' + gradient[0].end;
          })
          .text(function() {
            var top = piedata.filter(function( obj ) {
              return obj.value == max;
            });
            return top[0].label + ': ' + top[0].value + '%';
          });
      });
    });
}



$(document).ready(function() {
  $('[data-pie]').each(function() {
    var chartId = '#' + $(this).attr('id');
    var chartLabel = $(this).attr('data-pie-label');
    var piedata = data[$(this).attr('data-pie')];
    
    var width = 300,
    height = 300,
    radius = 140;

    var pie = d3.layout.pie()
      .value(function(d) {
        return d.value;
      })
      .sort(null);

    var arc = d3.svg.arc()
      .outerRadius(radius)
      .innerRadius(radius / 1.5);

    var max = d3.max(piedata, function(d) { return +d.value;} );

    var myChart = d3.select(chartId).append('svg')
      .attr('width', width)
      .attr('height', height)
      .append('g')
        .attr('transform', 'translate('+ (width / 2) +', '+ (height / 2) +')')
        .selectAll('path').data(pie(piedata))
        .enter().append('g')
          .attr('class', function(d, i) {
            var cssClass = 'slice';
            if (d.data.value === max) {
              cssClass += ' max';
            }
            return cssClass;
          });

    var gradient = d3.select(chartId + ' svg')
      .selectAll('linearGradient').data(gradients)
      .enter().append('linearGradient')
        .attr('id', function(d, i) {
          return gradients[i].id;
        });

    gradient.append('stop')
      .attr('offset', '0%')
      .attr('stop-color', function(d, i) {
        return gradients[i].start;
      });

    gradient.append('stop')
      .attr('offset', '100%')
      .attr('stop-color', function(d, i) {
        return gradients[i].end;
      });

    var slices = d3.selectAll(chartId + ' g.slice')
      .append('path')
        .attr('fill', function(d, i) {
          return 'url(#' + d.data.color + ')';
        })
        .attr('d', arc)
        .on('mouseover', function(d, i) {
          var gradient = gradients.filter(function( obj ) {
            return obj.id == d.data.color;
          });
          $(chartId + ' [data-slice]').css('opacity', 0.5);
          $(chartId + ' [data-slice=' + i + ']').css({
            'background': gradient[0].end,
            'opacity': 1
          });
        })
        .on('mouseout', function(d, i) {
          $(chartId + ' [data-slice]').css('opacity', 1);
          $(chartId + ' [data-slice=' + i + ']').css('background', 'rgba(0,0,0,0.2)');
        });

    var legend = d3.select(chartId)
      .attr('class', 'pie-chart')
      .append('ul')
        .attr('class', 'legend')
        .selectAll('li').data(pie(piedata))
        .enter().append('li')
          .attr('data-slice', function(d, i) {
            return i;
          })
          .attr('style', function(d, i) {
            var gradient = gradients.filter(function( obj ) {
              return obj.id == d.data.color;
            });
            return 'border-bottom: solid 3px' + gradient[0].end;
          })
          .text(function(d, i) {
            return d.data.label + ': ';
          });

    legend.append('span')
      .text(function(d, i) {
      return d.data.value + '%';
    });

    var maxCirc = d3.select(chartId)
      .append('div')
      .attr('class', 'max-circ');

    maxCirc.append('span')
      .attr('class', 'label')
      .text(chartLabel);

    maxCirc.append('span')
      .attr('class', 'value')
      .attr('style', function() {
        var top = piedata.filter(function( obj ) {
          return obj.value == max;
        });
        var gradient = gradients.filter(function( obj ) {
          return obj.id == top[0].color;
        });
        return 'color: ' + gradient[0].end;
      })
      .text(function() {
        var top = piedata.filter(function( obj ) {
          return obj.value == max;
        });
        return top[0].label + ': ' + top[0].value + '%';
      });
  });
});