const sortList = document.getElementById('sortRow')
const sortRow = document.getElementById('sortList')
const catalog = document.querySelector('.catalog_list')

if (sortList){
    sortRow.addEventListener('click', () => {
        catalog.classList.remove('listActive')
        var image = sortRow.querySelector('img')
        image.style.opacity = '.7'
        sortList.querySelector('img').style.opacity = '.4'
    })

    sortList.addEventListener('click', () => {
        catalog.classList.add('listActive')
        var image = sortList.querySelector('img')
        image.style.opacity = '.7'
        sortRow.querySelector('img').style.opacity = '.4'
    })
}
