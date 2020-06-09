<template>
  <div style="margin: 10px">
    <a-range-picker
      @change="load"
      v-model="dates"
      style="width: 270px"
    />
    <div
      style="margin-top: 5px;"
      v-if="ready"
    >
      <a-row :gutter="10">
        <a-col :span="6">
          <div style="border: 1px solid #ddd; padding: 4px; background-color: #398ff3; border-radius: 2px; color: white">
            <div style="font-weight: bold">Sensor 0</div>
            <div style="padding: 2px">TEMP MAX={{stats.sensor_0.temp_max}} MIN={{stats.sensor_0.temp_min}} AVG={{stats.sensor_0.temp_avg}}</div>
            <div style="padding: 2px">HUM MAX={{stats.sensor_0.hum_max}} MIN={{stats.sensor_0.hum_min}} AVG={{stats.sensor_0.hum_avg}}</div>
            <div style="padding: 2px">CO@ MAX={{stats.sensor_0.co2_max}} MIN={{stats.sensor_0.co2_min}} AVG={{stats.sensor_0.co2_avg}}</div>
          </div>
        </a-col>

        <a-col :span="6">
          <div style="border: 1px solid #ddd; padding: 4px; background-color: #71b687; border-radius: 2px; color: white">
            <div style="font-weight: bold">Sensor 1</div>
            <div style="padding: 2px">TEMP MAX={{stats.sensor_1.temp_max}} MIN={{stats.sensor_1.temp_min}} AVG={{stats.sensor_1.temp_avg}}</div>
            <div style="padding: 2px">HUM MAX={{stats.sensor_1.hum_max}} MIN={{stats.sensor_1.hum_min}} AVG={{stats.sensor_1.hum_avg}}</div>
            <div style="padding: 2px">CO2 MAX={{stats.sensor_1.co2_max}} MIN={{stats.sensor_1.co2_min}} AVG={{stats.sensor_1.co2_avg}}</div>

          </div>
        </a-col>

        <a-col :span="6">
          <div style="border: 1px solid #ddd; padding: 4px; background-color: #f4b143; border-radius: 2px; color: white">
            <div style="font-weight: bold">Sensor 2</div>
            <div style="padding: 2px">TEMP MAX={{stats.sensor_2.temp_max}} MIN={{stats.sensor_2.temp_min}} AVG={{stats.sensor_2.temp_avg}}</div>
            <div style="padding: 2px">HUM MAX={{stats.sensor_2.hum_max}} MIN={{stats.sensor_2.hum_min}} AVG={{stats.sensor_2.hum_avg}}</div>
            <div style="padding: 2px">CO2 MAX={{stats.sensor_2.co2_max}} MIN={{stats.sensor_2.co2_min}} AVG={{stats.sensor_2.co2_avg}}</div>

          </div>
        </a-col>

        <a-col :span="6">
          <div style="border: 1px solid #ddd; padding: 4px; background-color: #ec5463; border-radius: 2px; color: white">
            <div style="font-weight: bold">Sensor 3</div>
            <div style="padding: 2px">TEMP MAX={{stats.sensor_3.temp_max}} MIN={{stats.sensor_3.temp_min}} AVG={{stats.sensor_3.temp_avg}}</div>
            <div style="padding: 2px">HUM MAX={{stats.sensor_3.hum_max}} MIN={{stats.sensor_3.hum_min}} AVG={{stats.sensor_3.hum_avg}}</div>
            <div style="padding: 2px">CO2 MAX={{stats.sensor_3.co2_max}} MIN={{stats.sensor_3.co2_min}} AVG={{stats.sensor_3.co2_avg}}</div>

          </div>
        </a-col>

      </a-row>
    </div>
    <div
      class=""
      style="border: 1px solid #ddd; padding: 10px; margin-top: 5px"
    >
      <apexchart
        ref="chart_temp"
        height="300"
        type="line"
        :options="options_temp"
        :series="series_temp"
      ></apexchart>
    </div>
    <div
      class=""
      style="border: 1px solid #ddd; padding: 10px; margin-top: 5px"
    >
      <apexchart
        ref="chart_hum"
        height="300"
        type="line"
        :options="options_hum"
        :series="series_hum"
      ></apexchart>
    </div>
    <div
      class=""
      style="border: 1px solid #ddd; padding: 10px; margin-top: 5px"
    >
      <apexchart
        ref="chart_co2"
        height="300"
        type="line"
        :options="options_co2"
        :series="series_co2"
      ></apexchart>
    </div>
  </div>

</template>

<script>

export default {
  data: function () {
    return {
      ready: false,
      stats: {},
      dates: [
        moment().subtract(10, "d"),
        moment(),
      ],
      options_temp: {
        chart: {
          id: 'vuechart-temp'
        },
        yaxis: {
          title: {
            text: 'ºC'
          },
          lines: {
            show: true,

          },
        },
        stroke: {
          show: true,
          curve: 'smooth',
          lineCap: 'butt',
          width: 2,
          dashArray: 0,
        },
        legend: {
          position: 'top'
        },
        grid: {
          position: 'front'
        },
        title: {
          text: "Temperatura",
        },
        xaxis: {
          type: 'category',
          labels: {
            show: false,
            rotateAlways: true,
            rotate: -90,
          },
          lines: {
            show: false,
          },

          categories: []
        },
      },
      series_temp: [],
      options_hum: {
        stroke: {
          show: true,
          curve: 'smooth',
          lineCap: 'butt',
          width: 2,
          dashArray: 0,
        },
        chart: {
          id: 'vuechart-hum'
        },
        yaxis: {
          title: {
            text: '%'
          },
          lines: {
            show: true,

          },
        },
        legend: {
          position: 'top'
        },
        grid: {
          position: 'front'
        },
        title: {
          text: "Humedad",
        },
        xaxis: {
          type: 'category',
          labels: {
            show: false,
            rotateAlways: true,
            rotate: -90,
          },
          lines: {
            show: false,
          },

          categories: []
        },
      },
      series_hum: [],
      options_co2: {
        stroke: {
          show: true,
          curve: 'smooth',
          lineCap: 'butt',
          width: 2,
          dashArray: 0,
        },
        chart: {
          id: 'vuechart-co2'
        },
        yaxis: {
          title: {
            text: '%'
          },
          lines: {
            show: true,

          },
        },
        legend: {
          position: 'top'
        },
        grid: {
          position: 'front'
        },
        title: {
          text: "CO2",
        },
        xaxis: {
          type: 'category',
          labels: {
            show: false,
            rotateAlways: true,
            rotate: -90,
          },
          lines: {
            show: false,
          },

          categories: []
        },
      },
      series_co2: [],


    }
  },
  mounted () {
    console.log("mounted");
    this.load();
  },
  methods: {
    updateSeriesLine () {
      // this.$refs.chart_temp.render();
      this.$refs.chart_temp.updateOptions(this.options);
      this.$refs.chart_temp.updateSeries([{
        data: this.series[0].data,
      },
      {
        data: this.series[1].data,
      }], false, true)
    },
    load () {

      axios.get("data?from=" + this.dates[0].format("Y-MM-DD") + "&to=" + this.dates[1].format("Y-MM-DD")).then(function (resp) {
        console.log(resp);
        this.options_temp.xaxis.categories = resp.data.categories;
        this.$refs.chart_temp.updateOptions(this.options_temp);
        this.$refs.chart_temp.updateSeries([
          { name: 'sensor 0', data: resp.data.temp_0 },
          { name: 'sensor 1', data: resp.data.temp_1 },
          { name: 'sensor 2', data: resp.data.temp_2 },
          { name: 'sensor 3', data: resp.data.temp_3 },
        ]);

        this.options_hum.xaxis.categories = resp.data.categories;

        this.$refs.chart_hum.updateOptions(this.options_hum);
        this.$refs.chart_hum.updateSeries([
          { name: 'sensor 0', data: resp.data.hum_0 },
          { name: 'sensor 1', data: resp.data.hum_1 },
          { name: 'sensor 2', data: resp.data.hum_2 },
          { name: 'sensor 3', data: resp.data.hum_3 },
        ]);

        this.options_co2.xaxis.categories = resp.data.categories;
        this.$refs.chart_co2.updateOptions(this.options_co2);
        this.$refs.chart_co2.updateSeries([
          { name: 'sensor 0', data: resp.data.co2_0 },
          { name: 'sensor 1', data: resp.data.co2_1 },
          { name: 'sensor 2', data: resp.data.co2_2 },
          { name: 'sensor 3', data: resp.data.co2_3 },
        ]);

        this.stats = resp.data.stats;
        this.ready = true;


      }.bind(this));
    }
  }
}
</script>
