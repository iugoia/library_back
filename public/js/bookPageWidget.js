let tabAuthor = document.getElementById('tab_author');
let tabReviews = document.getElementById('tab_reviews');
let widgetAuthor = document.querySelector('.widget_inner_author');
let widgetReviews = document.querySelector('.widget_inner_reviews');
let sendAnswers = document.querySelectorAll('.answer_comment_btn');
let widgetAnswer = document.querySelector('.widget_inner_answer');

if (tabAuthor){
    tabAuthor.onclick = function() {
        widgetReviews.classList.add('widget_hide');
        widgetAuthor.classList.remove('widget_hide');
        widgetAnswer.classList.add('widget_hide');
        tabReviews.classList.remove('widget_tabs_link_active');
        tabAuthor.classList.add('widget_tabs_link_active');
    };
    tabReviews.onclick = function() {
        widgetAuthor.classList.add('widget_hide');
        widgetReviews.classList.remove('widget_hide');
        widgetAnswer.classList.add('widget_hide');
        tabReviews.classList.add('widget_tabs_link_active');
        tabAuthor.classList.remove('widget_tabs_link_active');
    };

    for(let sendAnswer of sendAnswers) {
        sendAnswer.onclick = function() {
            widgetAuthor.classList.add('widget_hide');
            widgetReviews.classList.add('widget_hide');
            widgetAnswer.classList.remove('widget_hide');
            tabReviews.classList.add('widget_tabs_link_active');
            tabAuthor.classList.remove('widget_tabs_link_active');
        };
    }

}

