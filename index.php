<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste des choses à faire</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="styles/app.css">
  </head>
  <body>
  <div id="app">
    <template>
      <h1>{{ title }}</h1>
      <div id="task-input">
        <input placeholder="Entrez une nouvelle tâche" v-model="newTask"></input>
        <button @click="addTask()" >Ajouter</button>
      </div>
      <hr>
      <div id="todo-list">
        <button id="show-completed" @click="showCompleted = !showCompleted">
          <span v-if="showCompleted">Masquer complétées</span>
          <span v-else>Afficher complétées</span>
        </button>
        <div v-for="(task, index) in tasks" class="task" :class="{ 'hidden': task.completed == 1 && !showCompleted }">
          <input :id=" 'task-id-' + index" type="checkbox" :checked="task.completed == 1 ? true : false" @change=" markTaskCompleted(task.id, task.completed == 1 ? 0 : 1 )" ></input>
          <label :for=" 'task-id-' + index" :class="{ 'striked': task.completed == 1 }">
            {{task.description}}
          </label>
          <button @click="deleteTask(task.id)" class="text pull-right">
            Delete
          </button>
        </div>
      </div>
    </template>
  </div>

  <script src="//cdn.jsdelivr.net/npm/vue"></script>
  <script src="//unpkg.com/axios/dist/axios.min.js"></script>
  <script src="scripts/app.js"></script>
  <!-- See https://atom.io/packages/livereload -->
  <script src="http://localhost:35729/livereload.js"></script>
  </body>
</html>
