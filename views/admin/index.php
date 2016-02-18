<?php $view->script('todo', 'todo:js/todo.js', 'vue') ?>

<div class="uk-form uk-form-horizontal uk-width-1-1" id="todo">
	<h2> {{ 'Add a new entry' | trans }} </h2>
    <div class=uk-form-row>
        <input type="text" class="uk-form-large uk-width-7-10" v-model="newEntry">
        <button class="uk-button uk-button-large uk-button-primary uk-width-2-10" @click="save"> {{ 'Add' | trans }} </button>
    </div>
    
<!--	<pre>{{ entries | json }}</pre>-->
	<h2>{{ 'Existing entries' | trans }}</h2>
	<div class="uk-alert" v-if="!entries.length">{{ 'No entries' | trans }}</div>
	<hr>
    <ul class="uk-list uk-list-line" v-if="entries.length">
        <li class="uk-text-large" v-for="entry in entries">
            <span class="uk-align-right">
                <button @click="toggle(entry)" class="uk-button">{{ (entry.do == 1) ? "Undo" : "Do" }}</button>
                <button @click="remove(entry)" class="uk-button uk-button-danger"><i class="uk-icon-remove"></i></button>
            </span>
            {{ entry.name }}
        </li>
    </ul>
</div>
