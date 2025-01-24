document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.testimonial-slider');
    const testimonials = document.querySelectorAll('.testimonial');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    
    let currentIndex = 0;
    const testimonialsToShow = 3;
    const totalTestimonials = testimonials.length;
    
    function updateSlider() {
        slider.style.transform = `translateX(-${currentIndex * (100 / testimonialsToShow)}%)`;
    }

    function showNextTestimonial() {
        currentIndex = (currentIndex + 1) % Math.ceil(totalTestimonials / testimonialsToShow);
        updateSlider();
    }

    function showPrevTestimonial() {
        currentIndex = (currentIndex - 1 + Math.ceil(totalTestimonials / testimonialsToShow)) % Math.ceil(totalTestimonials / testimonialsToShow);
        updateSlider();
    }

    nextButton.addEventListener('click', showNextTestimonial);
    prevButton.addEventListener('click', showPrevTestimonial);

    // Automatically slide to the next testimonial every 5 seconds
    setInterval(showNextTestimonial, 5000);
});
// heart
function toggleWishlist(button) {
    button.classList.toggle('active');
    // Add your logic to handle the wishlist functionality here
}

// signup
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    
    // Initialize form visibility
    toggleForm();
});

function toggleForm() {
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    if (loginForm.classList.contains('hidden')) {
        loginForm.classList.remove('hidden');
        loginForm.classList.add('visible');
        registerForm.classList.remove('visible');
        registerForm.classList.add('hidden');
    } else {
        loginForm.classList.remove('visible');
        loginForm.classList.add('hidden');
        registerForm.classList.remove('hidden');
        registerForm.classList.add('visible');
    }
}

function fetchData(type,filename,filepath)
{
    let log = $.ajax({
        url: filename,
        type: "POST",
        dataType: 'json',
        data: {
            action: 'fetch_data',
            tourSlider : 'tourslider',
        },
        success: function(data)
        {
            // console.log(data);
            let htmlContent = '';
            data.forEach(function(item)
            {
                if(item.category==type)
                {
                    htmlContent += `
                    <div class="testimonial">
                        <img src="${filepath+item.imgone}" alt="">
                        <button class="wishlist-btn" onclick="toggleWishlist(this)">
                            <span class="heart">&#10084;</span>
                        </button>
                        <h5 class="card-title">${item.title}</h5>
                        <p class="card-text ellipsis">${item.description}</p>
                        <p class="loc"><i class="fas fa-map-marker-alt"></i><span class="locations">Location: ${item.location}</span></p>
                        <a href="#" class="viewmore" onclick="viewmore(${item.id},'${filepath}')">View More</a>
                    </div>`;
                    ;
                }
            });
            $('#testomonial-slider').html(htmlContent)
        }
    });
    console.log(log);
}

function viewmore(id,filepath)
{
    console.log('working');
    localStorage.setItem('viewmore_id', id);
    window.location=filepath+'singlepage.php';
}

function fetchDetails(viewid,filepath)
{
    let log = $.ajax({
        url: filepath+'fetchmaster.php',
        type: "POST",
        dataType: 'json',
        data: {
            viewid : viewid,
        },
        success: function(data)
        {
            console.log(data);
            var viewdata=data[0];
            $('#description').html(viewdata.description);
            $('#clock').html(viewdata.hours);
            $('#pickup').html(viewdata.pickup);
            $('#time').html(viewdata.time);
            $('#padult').html(viewdata.adult+' * '+viewdata.price);
            $('#iframe').html(viewdata.map);
            $('#title').html(viewdata.title);

            $('#imgone').html(`<img class="single-img" src="${filepath+viewdata.imgone}" alt="" class="one"></img>`);
            $('#imgtwo').html(`<img class="single-img" src="${filepath+viewdata.imgtwo}" alt="" class="two"></img>`);
            $('#imgthree').html(`<img class="single-img" src="${filepath+viewdata.imgthree}" alt="" class="three"></img>`);
            $('#imgtfour').html(`<img class="single-img" src="${filepath+viewdata.imgfour}" alt="" class="four"></img>`);
            $('#imgtfive').html(`<img class="single-img" src="${filepath+viewdata.imgfive}" alt="" class="five"></img>`);
        }
    });
    console.log(log);
}

function addtocart(storedId,filepath)
{
    // var storedId = localStorage.getItem('viewmore_id');
    if(storedId)
    {
        let log = $.ajax({
            url: filepath+'fetchmaster.php',
            type: "POST",
            dataType: 'json',
            data: {
                addtocart : storedId,
            },
            success: function(data)
            {
                console.log(data);
                if(data.status=='error')
                {
                    alert(data.message);
                }else
                {
                    alert(data.message);
                }
            }
        });
        console.log(log);
    }
}


function fetchCartData(filepath)
{
    let log = $.ajax({
        url: filepath+'fetchmaster.php',
        type: "POST",
        dataType: 'json',
        data: {
            fetchCardData : 'fetchCard',
        },
        success: function(data)
        {
            console.log(data);
            let htmlContent = '';
            data.forEach(function(item)
            {
                htmlContent += `
                    <tr>
                        <td>${item.title}</td>
                        <td>${item.location}</td>
                        <td><button class="btn btn-danger" onclick="removecard(${item.id},'${filepath}')">Remove</button></td>
                        <td><button class="btn btn-danger" onclick="booknow(${item.id},'${filepath}')">Book Now</button></td>
                    </tr>`;
            });
            $('#cardData').html(htmlContent)
        }
    });
}

function removecard(id,filepath)
{
    let log = $.ajax({
        url: filepath+'fetchmaster.php',
        type: "POST",
        dataType: 'json',
        data: {
            removecard : id,
        },
        success: function(data)
        {
            console.log(data);
            if(data.status=='error')
            {
                alert(data.message);
            }else
            {
                alert(data.message);
                window.location.reload();
            }
        }
    });
    console.log(log);
}

function booknow(id,filepath)
{
    localStorage.setItem('bookid', id);
    window.location=filepath+'checkout.php';
}

function booklast(id,filepath)
{
    let log = $.ajax({
        url: filepath+'fetchmaster.php',
        type: "POST",
        dataType: 'json',
        data: {
            bookdetails : id,
        },
        success: function(data)
        {
            var data1=data[0];
            $('#tourname').html(data1.title);
            $('#amount').html(data1.price);
            $('#total').html(data1.price);
        }
    });
    console.log(log);
}