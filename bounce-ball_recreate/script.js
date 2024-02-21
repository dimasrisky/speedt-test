const canvas = document.getElementById('canvas')
const ctx = canvas.getContext('2d')

const canvas_width = 1200
const canvas_height = 600

let x = Math.random() * canvas_width 
let y = Math.random() * canvas_height 
let radius = 40
let pantul = 0
let state = {
    x: "kanan",
    y : "bawah"
}
let speed = 7
let opacity = 1

function resetAtribute(){
    opacity = 1
    pantul = 0
    x = Math.random() * canvas_width 
    y = Math.random() * canvas_height
}

function animationLoop(){
    ctx.clearRect(0, 0, canvas_width, canvas_height)
    ctx.globalAlpha = opacity
    ctx.beginPath()
    ctx.arc(x, y, radius, 0, 2 * Math.PI)
    ctx.fill()

    // pergerakan
    // if(state.y === "bawah") y += speed
    // if(state.y === "atas") y -= speed
    // if(state.x === "kiri") x -= speed
    // if(state.x === "kanan") x += speed


    // cek state sumbu y
    if(state.y === "bawah"){
        y += speed
    }else if(state.y === "atas"){
        y -= speed
    } 
    
    // cek state sumbu x
    if(state.x === "kiri"){
        x -= speed
    }else if(state.x === "kanan"){
        x += speed
    } 

    // collision wall

    // Atas Bawah
    if(y + radius > canvas_height){
        state.y = "atas"
        pantul++
    }else if(y + radius < 60){
        pantul++
        state.y = "bawah"
    }
    
    // Kiri kanan
    if(x + radius > canvas_width){
        pantul++
        state.x = "kiri"
    }else if(x + radius < 60){
        pantul++
        state.x = "kanan"
    }

    // Jika Bola memantul lebi dari 3 kali maka turunkan opacity nya
    // Dan jika opacity nya sudah 0, reset semua atribut nya menjadi semula
    if(pantul >= 3){
        opacity -= 0.1
        if(opacity < 0){
            resetAtribute()
        }
    }

    console.log(state)
    
    requestAnimationFrame(animationLoop)
}
animationLoop()