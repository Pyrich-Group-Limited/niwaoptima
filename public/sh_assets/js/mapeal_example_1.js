$(function() {
  'use strict';
  if ($(".mapeal-example-1").length) {
    $(".mapeal-example-1").mapael({
      map: {
        name: "france_departments",
        defaultArea: {
          attrsHover: {
            fill: "#343434",
            stroke: "#5d5d5d",
            "stroke-width": 1,
            "stroke-linejoin": "round"
          }
        }
      },
      legend: {
        plot: {
          cssClass: 'myLegend',
          mode: 'horizontal',
          labelAttrs: {
            fill: "#4a4a4a"
          },
          titleAttrs: {
            fill: "#4a4a4a"
          },
          marginBottom: 20,
          marginLeft: 10,
          hideElemsOnClick: {
            opacity: 0
          },
          title: "French cities population",
          slices: [{
            size: 5,
            type: "circle",
            max: 20000,
            attrs: {
              fill: "#89ff72"
            },
            label: "200 +"
          }, {
            size: 15,
            type: "circle",
            min: 20000,
            max: 100000,
            attrs: {
              fill: "#fffd72"
            },
            label: "200 - 100"
          }, {
            size: 20,
            type: "circle",
            min: 100000,
            max: 200000,
            attrs: {
              fill: "#ffbd54"
            },
            label: "100 - 200"
          }, {
            size: 25,
            type: "circle",
            min: 200000,
            attrs: {
              fill: "#ff5454"
            },
            label: "200 +"
          }]
        }
      },
       plots: {
        "city-lagos": {
          value: "14730000",  // Population: Lagos, Nigeria
          latitude: 6.5244,
          longitude: 3.3792,
          href: "#",
          tooltip: {
            content: "<span style=\"font-weight:bold;\">Lagos</span><br />Population: 14,730,000"
          }
        },
        "city-abuja": {
          value: "2140334",   // Population: Abuja, Nigeria
          latitude: 9.0579,
          longitude: 7.4951,
          href: "#",
          tooltip: {
            content: "<span style=\"font-weight:bold;\">Abuja</span><br />Population: 2,140,334"
          }
        },
        "city-port-harcourt": {
          value: "1148665",  // Population: Port Harcourt, Nigeria
          latitude: 4.8156,
          longitude: 7.0498,
          href: "#",
          tooltip: {
            content: "<span style=\"font-weight:bold;\">Port Harcourt</span><br />Population: 1,148,665"
          }
        },
        // Add more cities as needed
      }
    });
  }
});