document.querySelector(".chat[data-chat=person1]").classList.add("active-chat");
document.querySelector(".person[data-chat=person1]").classList.add("active");

var userIdActive = null;
let friends = {
    list: document.querySelector("ul.people"),
    all: document.querySelectorAll(".left .person"),
    name: "",
}
    // chat = {
    //     container: document.querySelector(".container .right"),
    //     current: null,
    //     person: null,
    //     name: document.querySelector(".container .right .top .name"),
    // };

friends.all.forEach((f) => {
    f.addEventListener("mousedown", () => {
        f.classList.contains("active") || setActiveChat(f);
    });
});

const firebaseConfig = {
    apiKey: "AIzaSyAs_-0Bv1A8fi1WtqsfB9cecFyH8fGZ8Xs",
    authDomain: "shop-chat-2e080.firebaseapp.com",
    projectId: "shop-chat-2e080",
    storageBucket: "shop-chat-2e080.appspot.com",
    messagingSenderId: "422478360130",
    appId: "1:422478360130:web:f2cfd37d6bafb2723147db",
};


// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Initialize Firestore
const db = firebase.firestore();

// Set up a real-time listener for changes in the "users" collection
db.collection("message").onSnapshot((snapshot) => {
    snapshot.docChanges().forEach((change) => {
        if (change.type === "added") {
            setActiveChat(change.doc.data().user_id)
        }
        // if (change.type === "modified") {
        //     console.log("Modified user: ", change.doc.data());
        // }
        // if (change.type === "removed") {
        //     console.log("Removed user: ", change.doc.data());
        // }
    });
});

db.collection("users").onSnapshot((snapshot) => {
    snapshot.docChanges().forEach((change) => {
        refreshCustomer()
    });
});


// Add Data
async function addData() {
    try {
        const docRef = await db.collection("message").add({
            user_id: userIdActive,
            created_at: new Date(),
            from_admin : true,
            message : $('#admin-chat').val()
        });
        console.log("Document written with ID: ", docRef.id);
        $('#admin-chat').val('');
    } catch (e) {
        console.error("Error adding document: ", e);
    }
}

// Get Data
async function getCustomers() {
    try {
        const querySnapshot = await db.collection("users").get();
        let result = [];
        querySnapshot.forEach((doc) => {
            result.push(doc);
        });
        return result;
    } catch (e) {
        console.error("Error getting documents: ", e);
    }
}



// Update Data
async function updateData() {
    const docId = prompt("Enter the document ID to update:");
    const userRef = db.collection("users").doc(docId);

    try {
        await userRef.update({
            email: "newemail@example.com",
        });
        console.log("Document successfully updated!");
    } catch (e) {
        console.error("Error updating document: ", e);
    }
}

// Delete Data
async function deleteData() {
    const docId = prompt("Enter the document ID to delete:");
    try {
        await db.collection("users").doc(docId).delete();
        console.log("Document successfully deleted!");
    } catch (e) {
        console.error("Error removing document: ", e);
    }
}

// refresh list user
async function refreshCustomer() {

    let allCus = await getCustomers();

    $('#people').children().remove();
    let child = ``;
    allCus.forEach(e => {

        child = `${child} <li class="person user_${e.data().user_id}" data-chat="person${e.id}"
                    onclick="setActiveChat(${e.data().user_id})"
                >
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/thomas.jpg" alt="" />
                            <span class="name">${e.data().name}</span>
                            <span class="time">2:09 PM</span>
                            <span class="preview">${e.data().last_message}</span>
                        </li>`
    })

    $('#people').append(child);
}

async function getDetail(id) {
    return db.collection("message").where("user_id", "==", id).orderBy('created_at')
        .get()
        .then((querySnapshot) => {
            let rs = []
            querySnapshot.forEach((doc) => {
                rs.push(doc);
            });

            return rs
        })
        .catch((error) => {
            console.log("Error getting documents: ", error);
        });


}

async function refreshChat(chats) {
    $('#content').children().remove();
    let chat = ``;
    chats.forEach(e => {
        chat = `${chat}<div class="bubble ${e.data().from_admin ? 'me' : 'you'}">
                    ${e.data().message}
                </div>`
    })

    $('#content').append(chat);
}

async function setActiveChat(id) {
    userIdActive = id;
    let detail = await getDetail(id);
    $('#content').children().remove();
    refreshChat(detail);
    let countCus = document.querySelector("#people").children.length;
    for (let index = 0; index < countCus; index++) {
        document.querySelector("#people").children[index].classList.remove('active')
    }
    $('.user_' + id).addClass('active');

}

document.addEventListener("DOMContentLoaded", async (event) => {
    try {
        refreshCustomer()
    } catch (e) {
        console.error("Error initializing Firebase: ", e);
    }
});
