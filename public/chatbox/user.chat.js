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
            refreshChat()
        }
        // if (change.type === "modified") {
        //     console.log("Modified user: ", change.doc.data());
        // }
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
            from_admin : false,
            message : jQuery('#custom-chat').val()
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
        const docRef = await db.collection("users").add({
            user_id: newGuest,
            created_at: new Date(),
            name : 'guest+' + newGuest,
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
        refreshChat()
    } catch (e) {
        console.error("Error initializing Firebase: ", e);
    }
});
