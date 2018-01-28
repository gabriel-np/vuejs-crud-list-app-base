// List CRUD Vue.js App
// Gabriel Nolet <gabriel.np@gmail.com>
var vue = new Vue ({
  el: '#app',
  data: {
    title: 'Liste des choses à faire',
    newTask: '',
    tasks: [],
    showCompleted: false
  },
  methods: {
    addTask () {
      var vm = this
      if (vm.newTask.length == 0) {
        alert("Veuillez entrer une tâche SVP.")
      }
      else {
        var date = new Date()
        var dateSeconds = date.valueOf()/1000
        var params =  "task=" + vm.newTask + "&date=" + dateSeconds
        axios.post('scripts/task-new.php?' + params )
          .then(function (response) {
            vm.newTask = ""
            vm.listTasks()
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },
    listTasks () {
      var vm = this
      axios.get('scripts/task-list.php')
        .then(function (response) {
          vm.tasks = response.data
        })
        .catch(function (error) {
          console.log(error)
        })
    },
    markTaskCompleted (id, completed) {
      var vm = this
      var params =  "id=" + id + "&completed=" + completed
      axios.post('scripts/task-complete.php?' + params )
        .then(function (response) {
          vm.listTasks()
        })
        .catch(function (error) {
          console.log(error)
        })
    },
    deleteTask (id) {
      var confirmation = confirm('Supprimer la tâche #' + id + '. Ça vous va?')
      if (confirmation == true) {
        var vm = this
        var params =  "id=" + id
        axios.post('scripts/task-delete.php?' + params )
          .then(function (response) {
            vm.listTasks()
          })
          .catch(function (error) {
            console.log(error)
          })
      }
      else {
        console.log('Not deleted.')
      }
    }
  },
  created () {
    this.listTasks()
  }
})
