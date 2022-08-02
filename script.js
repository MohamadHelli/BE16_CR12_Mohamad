let btn = document.getElementById("reduction");
btn.addEventListener("click", oportunity, false);

function oportunity() {
    const ajReq = new XMLHttpRequest();
    let content = document.getElementById("oportunity");
    ajReq.open("GET", "displayAll.php", true);
    ajReq.onload = function() {
        if (this.status == 200) {
            const cards = JSON.parse(ajReq.responseText);
            content.innerHTML = "";
            console.log(cards);
            for (const card of cards.data) {
                if (card.reduction === "No") {
                    continue;
                }
                content.innerHTML += `<div class = 'col-lg-4 col-md-6 col-sm-12 p-3'>
                <div class='card' style='width: 18rem;'>
                    <img img src="picture/${card.picture}" class='card-img-top' alt='...'>
                        <div class='card-body shadow-lg'>
                        <h5 class='card-title'>${card.title}</h5>
                        <p class='card-text'><span class = 'fw-bold'>Size : </span> ${card.size} m<sup>2</sup></p>
                        <p class='card-text'><span class = 'fw-bold'>Room Number : </span>${card.room_number}</p>
                        <p class='card-text'><span class = 'fw-bold'>City : </span>${card.city}</p>
                        <p class='card-text'><span class = 'fw-bold'>Address : </span>${card.address}</p>
                        <p class='card-text'><span class = 'fw-bold'>Reduction : </span>${card.reduction}</p>
                        <p class='card-text'><span class = 'fw-bold'>Price : </span>${card.price} €</p>
                        <div class='col-12 m-4'>
                            <a href='index.php?id=".$row['id']."'><button class='btn btn-warning'>Back</button></a>
                        </div>
                    </div>
                </div>
            </div>`;
            }
        }
    };
    ajReq.send();
}