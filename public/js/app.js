const slide = document.querySelectorAll(".slide__content-show")
const nextBtn = document.querySelector(".slide__content-next")
const backBtn = document.querySelector(".slide__content-back")
const nav = document.querySelectorAll(".slide__content-nav")
let count = 0

const slideShow = {
    init(){
        slide[0].classList.add('add')
        nav[0].classList.add('add')
        nextBtn.addEventListener('click',()=>{
            this.navActive()
            this.slideActive()
            this.next()
        })
        backBtn.addEventListener('click',()=>{
            this.navActive()
            this.slideActive()
            this.back()
        })
        this.nav()
        this.autoSlide()
    },
    nav(){
        nav.forEach((item,i)=>{
            item.addEventListener('click',()=>{
                this.navActive()
                this.slideActive()
                count = i
                nav[count].classList.add('add')
                slide[count].classList.add('add')
            })
        })
    },
    next(){
        ++count
        if (count > slide.length-1) {
             count = 0
        }
        slide[count].classList.add('add')
        nav[count].classList.add('add')
    },
    back(){
        --count
        if (count < 0){
            count = slide.length-1
         }
         slide[count].classList.add('add')
         nav[count].classList.add('add')
    },
    navActive(){
        nav.forEach(item=>{
            item.classList.remove('add')
        })
    },
    slideActive(){
        slide.forEach(item=>{
            item.classList.remove('add')}
        )
    },
    autoSlide(){
        setInterval(()=>{
            this.navActive()
            this.slideActive()
            this.next()
        },3000)
    }
}

slideShow.init()