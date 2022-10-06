function createInputBook() {
    var store_list = document.getElementById("store_list_book");
    var div_store_book = document.createElement("div");
    var input_text = document.createElement("input");
    var input_url = document.createElement("input");
    div_store_book.setAttribute("name", "div_store_book");
    input_text.setAttribute("type", "text");
    input_text.setAttribute("name", "store_name_book[]");
    input_text.setAttribute("placeholder", "ex : Fnac");
    input_url.setAttribute("type", "url");
    input_url.setAttribute("name", "store_link_book[]");
    store_list.appendChild(div_store_book)
    div_store_book.appendChild(input_text);
    div_store_book.appendChild(input_url);
    store_list.innerHTML;

}

function createInputMovie() {
    var store_list_movie = document.getElementById("store_list_movie");
    var div_store_movie = document.createElement("div");
    var input_text = document.createElement("input");
    var input_url = document.createElement("input");
    div_store_movie.setAttribute("name", "div_store_movie");
    input_text.setAttribute("type", "text");
    input_text.setAttribute("name", "store_name_movie[]");
    input_text.setAttribute("placeholder", "ex : Fnac");
    input_url.setAttribute("type", "url");
    input_url.setAttribute("name", "store_link_movie[]");
    store_list_movie.appendChild(div_store_movie)
    div_store_movie.appendChild(input_text);
    div_store_movie.appendChild(input_url);
    store_list.innerHTML;
}

function deleteInputBook() {
    const input_text = document.getElementsByName("store_name_book[]");
    const input_url = document.getElementsByName("store_link_book[]");
    const last_input_text = input_text[input_text.length - 1];
    const last_input_url = input_url[input_url.length - 1];
    last_input_text.remove();
    last_input_url.remove();
}

function deleteInputMovie() {
    const input_text = document.getElementsByName("store_name_movie[]");
    const input_url = document.getElementsByName("store_link_movie[]");
    const last_input_text = input_text[input_text.length - 1];
    const last_input_url = input_url[input_url.length - 1];
    last_input_text.remove();
    last_input_url.remove();
}

function createTextAreaDifferenceMovieBook() {
    var div_timeline = document.getElementById("timeline_content");
    var div_difference = document.createElement("div");
    var div_book_difference = document.createElement("div");
    var label_input_book = document.createElement("label");
    var label_input_time = document.createElement("label");
    var input_time_landmark = document.createElement("input")
    var input_book_difference = document.createElement("textarea");
    var div_movie_difference = document.createElement("div");
    var label_input_movie = document.createElement("label");
    var input_movie_difference = document.createElement("textarea");
    div_difference.setAttribute("class", "difference_between_movie_and_book");
    div_book_difference.setAttribute("class", "difference_book");
    label_input_time.setAttribute("for", 'time_landmark[]');
    label_input_time.setAttribute("class", 'label_time_landmark');
    label_input_time.innerHTML = ("Repère de temps : ");
    input_time_landmark.setAttribute("type", "time")
    input_time_landmark.setAttribute("name", "time_landmark[]")
    label_input_book.setAttribute("for", 'difference_in_the_book[]');
    label_input_book.setAttribute("class", 'label_book_difference');
    label_input_book.innerHTML = ("Différence dans le livre : ");
    input_book_difference.setAttribute("name", "difference_in_the_book[]");
    div_movie_difference.setAttribute("class", "difference_movie");
    label_input_movie.setAttribute("for", 'difference_in_the_movie[]');
    label_input_movie.setAttribute("class", 'label_movie_difference');
    label_input_movie.innerHTML = ("Différence dans le film : ");
    input_movie_difference.setAttribute("name", "difference_in_the_movie[]");
    div_timeline.appendChild(div_difference);
    div_difference.appendChild(label_input_time);
    div_difference.appendChild(input_time_landmark);
    div_book_difference.appendChild(label_input_book);
    div_book_difference.appendChild(input_book_difference);
    div_difference.appendChild(div_book_difference);
    div_difference.appendChild(div_movie_difference);
    div_movie_difference.appendChild(label_input_movie);
    div_movie_difference.appendChild(input_movie_difference);
    div_difference.innerHTML;
}

function deleteTextAreaDifferenceMovieBook() {
    const input_time_landmark = document.getElementsByName("time_landmark[]");
    const input_book = document.getElementsByName("difference_in_the_book[]");
    const input_movie = document.getElementsByName("difference_in_the_movie[]");
    const label_time_landmark = document.getElementsByClassName("label_time_landmark");
    const label_book_difference = document.getElementsByClassName("label_book_difference");
    const label_movie_difference = document.getElementsByClassName("label_movie_difference");
    const last_label_time = label_time_landmark[label_time_landmark.length - 1];
    const last_input_time = input_time_landmark[input_time_landmark.length - 1];
    const last_label_book = label_book_difference[label_book_difference.length - 1];
    const last_label_movie = label_movie_difference[label_movie_difference.length - 1];
    const last_input_book = input_book[input_book.length - 1];
    const last_input_movie = input_movie[input_movie.length - 1];
    last_input_book.remove();
    last_input_movie.remove();
    last_label_book.remove();
    last_label_movie.remove();
    last_label_time.remove();
    last_input_time.remove();

}



function createComponentsTimeLine() {
    var div_timeline_content = document.getElementById("timeline_content");
    var div_container = document.createElement("div");
    div_container.setAttribute("id", "container");
    var div_time_landmark = document.createElement("div");



    var label_time_landmark = document.createElement("label");
    label_time_landmark.setAttribute("name", "label_time_landmark");
    label_time_landmark.setAttribute("for", "time_landmark");
    label_time_landmark.innerHTML = ("Repère de temps : ");


    var input_time_landmark = document.createElement("input");
    input_time_landmark.setAttribute("type", "time");
    input_time_landmark.setAttribute("name", "time_landmark[]");


    var div_class_container = document.createElement("div");
    var label_class_container = document.createElement("label");
    label_class_container.setAttribute("name", "label_class_container");
    label_class_container.setAttribute("for", "class_container");
    label_class_container.innerHTML = ("Quel type de scène est-ce ? :")

    //creation d'un select avec ces options
    var select_class_container = document.createElement("select");
    select_class_container.setAttribute("name", "class_container[]");


    var option1_class_container = document.createElement("option");
    option1_class_container.setAttribute("value", "différence_book_and_movie");
    option1_class_container.innerHTML = "Scéne différente dans le livre et dans le film";


    var option2_class_container = document.createElement("option");
    option2_class_container.setAttribute("value", "missing_from_book");
    option2_class_container.innerHTML = "Scène absente dans le livre";


    var option3_class_container = document.createElement("option");
    option3_class_container.setAttribute("value", "missing_from_movie");
    option3_class_container.innerHTML = "Scène absente dans le film";


    var option4_class_container = document.createElement("option");
    option4_class_container.setAttribute("value", "différence_book_and_movie_spoiler");
    option4_class_container.innerHTML = "Scéne différente dans le livre et dans le film avec spoiler";


    var option5_class_container = document.createElement("option");
    option5_class_container.setAttribute("value", "missing_from_book_spoiler");
    option5_class_container.innerHTML = "Scène absente dans le livre avec spoiler";


    var option6_class_container = document.createElement("option");
    option6_class_container.setAttribute("value", "missing_from_movie_spoiler");
    option6_class_container.innerHTML = "Scène absente dans le film avec spoiler";


    var div_time_container = document.createElement("div");
    var label_time_container = document.createElement("label");
    label_time_container.setAttribute("name", "label_time_container");
    label_time_container.setAttribute("for", "time_container");
    label_time_container.innerHTML = ("Décrivez la scène : ");


    var textarea_time_container = document.createElement("textarea");
    textarea_time_container.setAttribute("name", "time_container[]");



    div_timeline_content.appendChild(div_container);
    div_container.appendChild(div_time_landmark);
    div_container.appendChild(div_class_container);
    div_container.appendChild(div_time_container);
    div_time_landmark.appendChild(label_time_landmark);
    div_time_landmark.appendChild(input_time_landmark);
    div_class_container.appendChild(label_class_container);
    div_class_container.appendChild(select_class_container);
    select_class_container.appendChild(option1_class_container);
    select_class_container.appendChild(option2_class_container);
    select_class_container.appendChild(option3_class_container);
    select_class_container.appendChild(option4_class_container);
    select_class_container.appendChild(option5_class_container);
    select_class_container.appendChild(option6_class_container);
    div_time_container.appendChild(label_time_container);
    div_time_container.appendChild(textarea_time_container);
}

function deleteComponentTimeLine() {
    const label_time_landmark = document.getElementsByName("label_time_landmark");
    const label_class_container = document.getElementsByName("label_class_container");
    const label_time_container = document.getElementsByName("label_time_container");
    const time_landmark = document.getElementsByName("time_landmark[]");
    const class_container = document.getElementsByName("class_container[]");
    const time_container = document.getElementsByName("time_container[]");
    const last_label_time_landmark = label_time_landmark[label_time_landmark.length - 1];
    const last_label_class_container = label_class_container[label_class_container.length - 1];
    const last_label_time_container = label_time_container[label_time_container.length - 1];
    const last_time_landmark = time_landmark[time_landmark.length - 1];
    const last_class_container = class_container[class_container.length - 1];
    const last_time_container = time_container[time_container.length - 1];
    last_label_time_landmark.remove();
    last_label_class_container.remove();
    last_label_time_container.remove();
    last_time_landmark.remove();
    last_class_container.remove();
    last_time_container.remove();

}