function updateHeadline(title, picture, content) {
    document.getElementById('headlineTitle').innerHTML = title;
    document.getElementById('headlinePicture').setAttribute('src', picture);
    document.getElementById('headlineContent').innerHTML = content;
}

document.getElementById('changeHeadlineButton').addEventListener('click', function () {
    //TODO 1 : Get a random article
    fetch('api/articles/random')
        .then(response => response.json())
        .then(article => updateHeadline(article.title, article.picture, article.content));
});

document.getElementById('searchHeadline').addEventListener('input', function (e) {
    //Here we get the value typed in the input
    let search = e.target.value;

    //TODO 2 : Call the route 'api/articles/search' to get the list of the articles targeted by the search
    fetch('api/articles/search?search=' + search)
        .then(response => response.json())
        .then(function (articles) {
            const ul = document.getElementById('resultList');
            ul.innerHTML = '';
            for (article of articles) {
                const li = document.createElement('li');
                li.innerHTML = `<a href="/article?id=${article.id}">${article.title}</a>`
                ul.append(li);
            }
        })
});