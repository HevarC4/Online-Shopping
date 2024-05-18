let times = document.getElementById('times');

    let checkTimes=(value)=>{
        if(value != ''){
            times.classList.remove('hidden')
        }else{
            times.classList.add('hidden')
        }
    }
    let cleanSearch=()=>{
        times.classList.add('hidden')
        document.getElementById('search').value=''
    }
