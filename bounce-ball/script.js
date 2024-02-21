const canvas = document.getElementById('canvas')
const ctx = canvas.getContext('2d')
const canvas_width = 1200;
const canvas_height = 600;
let centerX = Math.random() * canvas_width - 200
let centerY = 100
let radius = 50
let direction = 'down'
let pantul = 0
let speed = 5
let opacity = 1

// Untuk mereset semua atribut menjadi ke bentuk awal
let reset = () => {
    centerX = Math.random() * canvas_width - 1
    centerY = 100
    direction = 'down'
    pantul = 0
    opacity = 1
}

const animationLoop = () => {
    ctx.clearRect(0, 0, canvas_width, canvas_height)
    ctx.beginPath();
    ctx.globalAlpha = opacity
    ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI)
    ctx.fill()

    console.log(pantul)

    if(pantul >= 3){
        opacity -= 0.3
        if(opacity <= -1) reset()
    }

    // logic collision ( jika titik tengah Y lebih besar dari tinggi canvas)
    if(centerY + radius > canvas_height){
        direction = 'up'
        pantul++
    } 
    
    // logic collision ( jika titik tengah Y lebih kecil dari 0/bagian atas canvas)
    if(centerY - radius < 0) {
        direction = 'down'
        pantul++
    }

    if(direction === 'up'){
        centerY -= speed
    }else if(direction === 'down'){
        centerY += speed
    }

    requestAnimationFrame(animationLoop)
}

animationLoop()