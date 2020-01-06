var gradients = [
  {id: 'red', start: '#eb1c1c', end: '#eb1c1c'},
  {id: 'orange', start: '#ff8000', end: '#ff8000'},
  {id: 'yellow', start: '#f2d600', end: '#f2d600'},
  {id: 'green', start: '#038f0a', end: '#038f0a'},

  {id: 'blue1', start: '#FFD596', end: '#FFD596'},
  {id: 'blue2', start: '#E8BE80', end: '#E8BE80'},
  {id: 'blue3', start: '#BA9966', end: '#BA9966'},
  {id: 'blue4', start: '#8C734D', end: '#8C734D'},
  {id: 'blue5', start: '#5D4C33', end: '#5D4C33'},
  {id: 'blue6', start: '#2F261A', end: '#2F261A'},

  {id: 'pink', start: '#b34f53', end: '#dd5b59'},
  {id: 'blue', start: '#095a82', end: '#0170a7'},
  {id: 'other', start: '#2272ad', end: '#308cd0'}
];


data = [];

/* Graphique sexe */
var pourcentage_femmes = document.getElementById("pcFemmes").value;
var pourcentage_hommes = document.getElementById("pcHommes").value;

data['piedata1'] = [
  { label: "Hommes", value: pourcentage_hommes, color: 'other' },
  { label: "Femmes", value: pourcentage_femmes, color: 'pink' }
];

/* Graphique âge */
var pourcentage_age_1 = document.getElementById("pcAge1").value;
var pourcentage_age_2 = document.getElementById("pcAge2").value;
var pourcentage_age_3 = document.getElementById("pcAge3").value;
var pourcentage_age_4 = document.getElementById("pcAge4").value;
var pourcentage_age_5 = document.getElementById("pcAge5").value;
var pourcentage_age_6 = document.getElementById("pcAge6").value;

data['piedata2'] = [
  { label: "< 20", value: pourcentage_age_1, color: 'blue1' },
  { label: "20-30", value: pourcentage_age_2, color: 'blue2' },
  { label: "30-40", value: pourcentage_age_3, color: 'blue3' },
  { label: "40-50", value: pourcentage_age_4, color: 'blue4' },
  { label: "50-60", value: pourcentage_age_5, color: 'blue5' },
  { label: "> 60", value: pourcentage_age_6, color: 'blue6' }
];

/* Graphique score partiel */
var score_tests_partiels_1 = document.getElementById("pcPartiel1").value;
var score_tests_partiels_2 = document.getElementById("pcPartiel2").value;
var score_tests_partiels_3 = document.getElementById("pcPartiel3").value;
var score_tests_partiels_4 = document.getElementById("pcPartiel4").value;

data['piedata4'] = [
  { label: "< 25", value: score_tests_partiels_1, color: 'red' },
  { label: "25-50", value: score_tests_partiels_2, color: 'orange' },
  { label: "50-75", value: score_tests_partiels_3, color: 'yellow' },
  { label: "> 75", value: score_tests_partiels_4, color: 'green' }
];

/* Graphique score partiel */
var score_tests_complets_1 = document.getElementById("pcComplet1").value;
var score_tests_complets_2 = document.getElementById("pcComplet2").value;
var score_tests_complets_3 = document.getElementById("pcComplet3").value;
var score_tests_complets_4 = document.getElementById("pcComplet4").value;

data['piedata5'] = [
  { label: "< 25", value: score_tests_complets_1, color: 'red' },
  { label: "25-50", value: score_tests_complets_2, color: 'orange' },
  { label: "50-75", value: score_tests_complets_3, color: 'yellow' },
  { label: "> 75", value: score_tests_complets_4, color: 'green' }
];

/* Graphique score total */
var score_total_1 = document.getElementById("pcTotal1").value;
var score_total_2 = document.getElementById("pcTotal2").value;
var score_total_3 = document.getElementById("pcTotal3").value;
var score_total_4 = document.getElementById("pcTotal4").value;

data['piedata3'] = [
  { label: "< 25", value: score_total_1, color: 'red' },
  { label: "25-50", value: score_total_2, color: 'orange' },
  { label: "50-75", value: score_total_3, color: 'yellow' },
  { label: "> 75", value: score_total_4, color: 'green' }
];



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
          $(chartId + ' [data-slice=' + i + ']').css('background', '#2e5a87');
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
