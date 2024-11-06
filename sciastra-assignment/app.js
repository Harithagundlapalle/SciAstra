document.addEventListener("DOMContentLoaded", () => {
    fetch("backend/courses.php")
        .then(response => response.json())
        .then(data => {
            const courseList = document.getElementById("course-list");
            data.forEach(course => {
                const courseItem = document.createElement("div");
                courseItem.className = "course-item";
                courseItem.innerHTML = `
                    <h2>${course.title}</h2>
                    <p>Discounted Price: $${course.discounted_price}</p>
                    <button onclick="redirectToPayment(${course.id})">Purchase</button>
                `;
                courseList.appendChild(courseItem);
            });
        });
});

function redirectToPayment(courseId) {
    window.location.href = `payment.html?course=${courseId}`;
}
