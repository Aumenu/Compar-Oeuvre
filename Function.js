function createInputBook() {
    var store_list = document.getElementById("store_list_book");
    var div_store_book = document.createElement("div");
    var label_store_book = document.createElement("label");
    var input_text = document.createElement("input");
    var input_url = document.createElement("input");
    div_store_book.setAttribute("name", "div_store_book");
    label_store_book.setAttribute("for", 'store_name_book[]');
    label_store_book.setAttribute("class", 'label_store_book');
    label_store_book.innerHTML = ("Lien vers site de commerce : ");
    input_text.setAttribute("type", "text");
    input_text.setAttribute("name", "store_name_book[]");
    input_text.setAttribute("placeholder", "ex : Fnac");
    input_url.setAttribute("type", "url");
    input_url.setAttribute("name", "store_link_book[]");
    input_url.setAttribute("placeholder", "ex : htttps//lafnac.com")
    store_list.appendChild(div_store_book);
    div_store_book.appendChild(label_store_book);
    div_store_book.appendChild(input_text);
    div_store_book.appendChild(input_url);
    store_list.innerHTML;

}

function createInputMovie() {
    var store_list_movie = document.getElementById("store_list_movie");
    var div_store_movie = document.createElement("div");
    var label_store_movie = document.createElement("label");
    var input_text = document.createElement("input");
    var input_url = document.createElement("input");
    div_store_movie.setAttribute("name", "div_store_movie");
    label_store_movie.setAttribute("for", 'store_name_movie[]');
    label_store_movie.setAttribute("class", 'label_store_movie');
    label_store_movie.innerHTML = ("Lien vers site de commerce : ");
    input_text.setAttribute("type", "text");
    input_text.setAttribute("name", "store_name_movie[]");
    input_text.setAttribute("placeholder", "ex : Fnac");
    input_url.setAttribute("type", "url");
    input_url.setAttribute("name", "store_link_movie[]");
    input_url.setAttribute("placeholder", "ex : htttps//lafnac.com")
    store_list_movie.appendChild(div_store_movie)
    div_store_movie.appendChild(label_store_movie);
    div_store_movie.appendChild(input_text);
    div_store_movie.appendChild(input_url);
    store_list.innerHTML;
}

function deleteInputBook() {
    const input_text = document.getElementsByName("store_name_book[]");
    const input_url = document.getElementsByName("store_link_book[]");
    const label_store_book = document.getElementsByClassName("label_store_book");
    const last_label_store_book = label_store_book[label_store_book.length - 1];
    const last_input_text = input_text[input_text.length - 1];
    const last_input_url = input_url[input_url.length - 1];
    last_label_store_book.remove();
    last_input_text.remove();
    last_input_url.remove();
}

function deleteInputMovie() {
    const input_text = document.getElementsByName("store_name_movie[]");
    const input_url = document.getElementsByName("store_link_movie[]");
    const label_store_movie = document.getElementsByClassName("label_store_movie");
    const last_label_store_movie = label_store_movie[label_store_movie.length - 1];
    const last_input_text = input_text[input_text.length - 1];
    const last_input_url = input_url[input_url.length - 1];
    last_label_store_movie.remove();
    last_input_text.remove();
    last_input_url.remove();
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



function spoiler(){
    var timeline_spoiler = document.getElementById("timeline");
    timeline_spoiler.classList.toggle("spoiler");
}