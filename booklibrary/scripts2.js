let workTittle = document.getElementById('work');
let breakTittle = document.getElementById('break');
let workTime = 25;
let breakTime = 5;
let seconds = "00";
let timer;
let isPaused = false;
let alarmSound = document.getElementById('alarmSound');

// Get streak from localStorage
let streak = localStorage.getItem('streak') ? parseInt(localStorage.getItem('streak')) : 0;
let lastUsedDate = localStorage.getItem('lastUsedDate');

// display
window.onload = () => {
    document.getElementById('minutes').innerHTML = workTime;
    document.getElementById('seconds').innerHTML = seconds;
    document.getElementById('streakCount').innerHTML = streak;
    workTittle.classList.add('active');
    updateStreak();
}

function setTimes() {
    workTime = document.getElementById('workTimeInput').value;
    breakTime = document.getElementById('breakTimeInput').value;
    document.getElementById('minutes').innerHTML = workTime;
    document.getElementById('seconds').innerHTML = seconds;
}

function start() {
    document.getElementById('start').style.display = "none";
    document.getElementById('pause').style.display = "block";
    document.getElementById('reset').style.display = "block";

    seconds = 59;
    let workMinutes = workTime - 1;
    let breakMinutes = breakTime - 1;
    let breakCount = 0;

    let timerFunction = () => {
        if (!isPaused) {
            document.getElementById('minutes').innerHTML = workMinutes;
            document.getElementById('seconds').innerHTML = seconds;

            seconds = seconds - 1;

            if (seconds === 0) {
                workMinutes = workMinutes - 1;
                if (workMinutes === -1) {
                    alarmSound.play(); // Play alarm sound
                    if (breakCount % 2 === 0) {
                        workMinutes = breakMinutes;
                        breakCount++;
                        workTittle.classList.remove('active');
                        breakTittle.classList.add('active');
                    } else {
                        workMinutes = workTime;
                        breakCount++;
                        breakTittle.classList.remove('active');
                        workTittle.classList.add('active');
                    }
                }
                seconds = 59;
            }
        }
    }

    timer = setInterval(timerFunction, 1000);
    updateStreak();
}

function pause() {
    isPaused = !isPaused;
    if (isPaused) {
        document.getElementById('pause').innerHTML = '<i class="fa-solid fa-play"></i>';
    } else {
        document.getElementById('pause').innerHTML = '<i class="fa-solid fa-pause"></i>';
    }
}

