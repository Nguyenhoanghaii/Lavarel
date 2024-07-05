function makeid(length) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;
    let counter = 0;
    while (counter < length) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
    }
    return result;
}

const newGuest = Math.floor(Math.random() * 99999999);
let isCreated = false;

console.log('userIdActive', newGuest);


const firebaseConfig = {
    apiKey: "AIzaSyAhxtUhEnu5UNn3n6FsGKaNy5PINj7Mqxk",
    authDomain: "chatbox-de2da.firebaseapp.com",
    projectId: "chatbox-de2da",
    storageBucket: "chatbox-de2da.appspot.com",
    messagingSenderId: "750663331947",
    appId: "1:750663331947:web:c77bef8d9b86a71300012e"
};


// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Initialize Firestore
const db = firebase.firestore();

// Set up a real-time listener for changes in the "users" collection
db.collection("message").onSnapshot((snapshot) => {
    snapshot.docChanges().forEach((change) => {

        if (change.type === "added") {
            console.log('change', change);
            refreshChat()
        }
        if (change.type === "modified") {
            refreshChat()
        }
        // if (change.type === "removed") {
        //     console.log("Removed user: ", change.doc.data());
        // }
    });
});


// Add Message
async function addData() {

    try {
        if (!isCreated) addUser();
        const docRef = await db.collection("message").add({
            user_id: newGuest,
            created_at: new Date(),
            from_admin: false,
            message: jQuery('#custom-chat').val()
        });
        console.log("Document written with ID: ", docRef.id);
        jQuery('#custom-chat').val('');
    } catch (e) {
        console.error("Error adding document: ", e);
    }
}

// Add User
async function addUser() {
    try {
        const docRef = await db.collection("customer").add({
            user_id: newGuest,
            created_at: new Date(),
            name: 'guest+' + newGuest,
        });
        isCreated = true
        console.log("Document written with ID: ", docRef.id);
    } catch (e) {
        console.error("Error adding document: ", e);
    }
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

async function refreshChat() {
    jQuery('.messages').children().remove()

    let chats = await getDetail(newGuest)
    console.log('chats', chats);

    let chat = ``;
    chats.forEach(e => {
        chat = `${chat}<li class="${e.data().from_admin ? 'self' : 'other'}"><span>P</span>${e.data().message}</li>`
    })

    jQuery('.messages').append(chat)
}

document.addEventListener("DOMContentLoaded", async (event) => {
    try {
        // refreshChat()
    } catch (e) {
        console.error("Error initializing Firebase: ", e);
    }
});
