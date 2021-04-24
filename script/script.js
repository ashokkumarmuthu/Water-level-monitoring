FusionCharts.ready(function() {
  var updateAnnotation,
    chart = new FusionCharts({
      type: 'thermometer',
      renderAt: 'chart-container',
      id: 'myThm',
      width: '500',
      height: '400',
      dataFormat: 'json',
      dataSource: {
        "chart": {
          "theme": "fusion",
          "caption": "Water Level",
          "lowerLimit": "10",
          "upperLimit": "50",

          "decimals": "1",
          "numberSuffix": " cm",
          "showhovereffect": "1",
          "thmFillColor": "#008ee4",
          "showGaugeBorder": "1",
          "gaugeBorderColor": "#008ee4",
          "gaugeBorderThickness": "2",
          "gaugeBorderAlpha": "30",
          "thmOriginX": "100",
          "chartBottomMargin": "20",
          "valueFontColor": "#000000",
          "theme": "fusion"
        },
        "value": "0",
        //All annotations are grouped under this element
        "annotations": {
          "showbelow": "0",
          "groups": [{
            //Each group needs a unique ID
            "id": "indicator",
            
          }]

        },
      },
      "events": {
        "initialized": function(evt, arg) {
          var dataUpdate = setInterval(function() {
            var value;
              var JSON = $.ajax({
				contentType: "application/json; charset=utf-8",
                url:"http://iotbitsathy.ga/tank/fetch.php?i=1",
                dataType: 'json',
                async: false}).responseText;
            var Request=jQuery.parseJSON(JSON);
            FusionCharts.items["myThm"].feedData("&value=" + Request[0].ran);

          }, 1300);
        
        },
      
      }
    })
    .render();
});
