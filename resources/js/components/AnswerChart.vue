<script>
import VueCharts from 'vue-chartjs'
import { Pie } from 'vue-chartjs'

export default {
  extends: Pie,
  data() {
    return {
      dataSet: null,
      options: {
        responsive: true,
        maintainAspectRatio: false,
        pieceLabel: {
          mode: 'percentage',
          precision: 1
        }
      }
    }
  },
  props: ['labels'],
  mounted () {
    this.fetchData()
  },
  methods: {
    fetchData() {
      window.axios.get('/api/quizzes-chart')
      .then(response => {

        const dataSet = response.data.map(i => i.total);
        this.renderChart({
          labels: this.labels,
          datasets: [
            {
              backgroundColor: [
                '#41B883',
                '#E46651',
                '#00D8FF',
              ],
              data: dataSet
            }
          ]
        }, this.options)

      })
    },
  }
}
</script>