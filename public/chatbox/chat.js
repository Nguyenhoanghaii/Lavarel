document.querySelector(".chat[data-chat=person1]").classList.add("active-chat");
document.querySelector(".person[data-chat=person1]").classList.add("active");

let friends = {
    list: document.querySelector("ul.people"),
    all: document.querySelectorAll(".left .person"),
    name: "",
},
    chat = {
        container: document.querySelector(".container .right"),
        current: null,
        person: null,
        name: document.querySelector(".container .right .top .name"),
    };

friends.all.forEach((f) => {
    f.addEventListener("mousedown", () => {
        f.classList.contains("active") || setAciveChat(f);
    });
});

function setAciveChat(f) {
    friends.list.querySelector(".active").classList.remove("active");
    f.classList.add("active");
    chat.current = chat.container.querySelector(".active-chat");
    chat.person = f.getAttribute("data-chat");
    chat.current.classList.remove("active-chat");
    chat.container
        .querySelector('[data-chat="' + chat.person + '"]')
        .classList.add("active-chat");
    friends.name = f.querySelector(".name").innerText;
    chat.name.innerHTML = friends.name;
}

document.addEventListener("DOMContentLoaded", async (event) => {
    // Your web app's Firebase configuration
    const firebaseConfig = {
        apiKey: "AIzaSyAs_-0Bv1A8fi1WtqsfB9cecFyH8fGZ8Xs",
        authDomain: "shop-chat-2e080.firebaseapp.com",
        projectId: "shop-chat-2e080",
        storageBucket: "shop-chat-2e080.appspot.com",
        messagingSenderId: "422478360130",
        appId: "1:422478360130:web:f2cfd37d6bafb2723147db",
    };

    try {
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        // Initialize Firestore
        const db = firebase.firestore();

        // Add Data
        async function addData() {
            try {
                const docRef = await db.collection("users").add({
                    name: "John Doe",
                    email: "johndoe@example.com",
                });
                console.log("Document written with ID: ", docRef.id);
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

        async function getDetail(id) {
            var docRef = await db.collection('message')
            .where('user_id', '==', id)
            .orderBy("created_at")
            .get();

            docRef.forEach((doc) => {
                if (doc.exists) {
                    console.log("Document data:", doc.data());
                } else {
                    // doc.data() will be undefined in this case
                    console.log("No such document!");
                }
            }).catch((error) => {
                console.log("Error getting document:", error);
            });

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

        let allCus = await getCustomers();

        $('#people').children().remove();
        let child = ``;
        allCus.forEach(e => {

            getDetail(e.id);
            console.log('e', e.id);

            child = `${child} <li class="person" data-chat="person${e.id}">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/thomas.jpg" alt="" />
                        <span class="name">${e.data().name}</span>
                        <span class="time">2:09 PM</span>
                        <span class="preview">I was wondering...</span>
                    </li>`
        })

        $('#people').append(child);

        // Set up a real-time listener for changes in the "users" collection
        db.collection("users").onSnapshot((snapshot) => {
            snapshot.docChanges().forEach((change) => {
                if (change.type === "added") {
                    // console.log("New user: ", change.doc.data());
                }
                if (change.type === "modified") {
                    console.log("Modified user: ", change.doc.data());
                }
                if (change.type === "removed") {
                    console.log("Removed user: ", change.doc.data());
                }
            });
        });
    } catch (e) {
        console.error("Error initializing Firebase: ", e);
    }


});
