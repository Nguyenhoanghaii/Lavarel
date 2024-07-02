<!DOCTYPE html>
<html>
<head>
  <title>Firebase Firestore Example</title>
  <!-- Firebase App (the core Firebase SDK) -->
  <script src="/firebase/firebase-app-compat.js"></script>
  <!-- Firebase Firestore -->
  <script src="/firebase/firebase-firestore-compat.js"></script>
</head>
<body>
  <button id="addButton">Add Data</button>
  <button id="getButton">Get Data</button>
  <button id="updateButton">Update Data</button>
  <button id="deleteButton">Delete Data</button>

  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      // Your web app's Firebase configuration
      const firebaseConfig = {
        apiKey: "AIzaSyAs_-0Bv1A8fi1WtqsfB9cecFyH8fGZ8Xs",
        authDomain: "shop-chat-2e080.firebaseapp.com",
        projectId: "shop-chat-2e080",
        storageBucket: "shop-chat-2e080.appspot.com",
        messagingSenderId: "422478360130",
        appId: "1:422478360130:web:f2cfd37d6bafb2723147db"
      };

      try {
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        // Initialize Firestore
        const db = firebase.firestore();

        // Add Data
        document.getElementById('addButton').addEventListener('click', async () => {
          try {
            const docRef = await db.collection("users").add({
              name: "John Doe",
              email: "johndoe@example.com"
            });
            console.log("Document written with ID: ", docRef.id);
          } catch (e) {
            console.error("Error adding document: ", e);
          }
        });

        // Get Data
        document.getElementById('getButton').addEventListener('click', async () => {
          try {
            const querySnapshot = await db.collection("users").get();
            querySnapshot.forEach((doc) => {
              console.log(`${doc.id} => ${doc.data().name}`);
            });
          } catch (e) {
            console.error("Error getting documents: ", e);
          }
        });

        // Update Data
        document.getElementById('updateButton').addEventListener('click', async () => {
          const docId = prompt("Enter the document ID to update:");
          const userRef = db.collection("users").doc(docId);

          try {
            await userRef.update({
              email: "newemail@example.com"
            });
            console.log("Document successfully updated!");
          } catch (e) {
            console.error("Error updating document: ", e);
          }
        });

        // Delete Data
        document.getElementById('deleteButton').addEventListener('click', async () => {
          const docId = prompt("Enter the document ID to delete:");
          try {
            await db.collection("users").doc(docId).delete();
            console.log("Document successfully deleted!");
          } catch (e) {
            console.error("Error removing document: ", e);
          }
        });

        // Set up a real-time listener for changes in the "users" collection
        db.collection("users").onSnapshot((snapshot) => {
          snapshot.docChanges().forEach((change) => {
            if (change.type === "added") {
              console.log("New user: ", change.doc.data());
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
  </script>
</body>
</html>
