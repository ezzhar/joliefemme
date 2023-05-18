// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyApZXlj5R5cTYvb2o-BE2OeCtsbwBWFU5c",
  authDomain: "jolie-femme-fa6b0.firebaseapp.com",
  databaseURL: "https://jolie-femme-fa6b0-default-rtdb.firebaseio.com",
  projectId: "jolie-femme-fa6b0",
  storageBucket: "jolie-femme-fa6b0.appspot.com",
  messagingSenderId: "938680347105",
  appId: "1:938680347105:web:142c97d6af22946d334aa0",
  measurementId: "G-G9SQJ7PTPW"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);