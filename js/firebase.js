var firebaseConfig = {
  apiKey: "AIzaSyBjj2y76S72DHCzqzBLrjlG1FHjt6n2opc",
  authDomain: "quiz-pintar-70d15.firebaseapp.com",
  databaseURL: "https://quiz-pintar-70d15.firebaseio.com",
  projectId: "quiz-pintar-70d15",
  storageBucket: "quiz-pintar-70d15.appspot.com",
  messagingSenderId: "933834313836",
  appId: "1:933834313836:web:443ac7f4dd5ac9eb33c849",
  measurementId: "G-WLP6W6DBBL"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();



function InsertNotif(userId, time, name) {
  firebase.database().ref('notif/' + userId).set({
    time: time, 
    name: name
  },function(error) {
      if (error) {
        Swal.fire(
          'Oops...',
          'Terjadi kesalahan ...',
          'error'
        )
      } else {
        // Swal.fire(
        //   'Berhasil Gabung Game',
        //   'Silahkan tunggu sampai game dimulai ...',
        //   'success'
        // )
        Swal.fire({
          icon: "success",
          title: 'Berhasil Gabung Game',
          text: 'Silahkan tunggu sampai game dimulai ...',
          // onBeforeOpen: () => {
          //   NotifIn();
          // },
          onClose: () => {
            NotifIn();
          }
        })
        
      }
    }
  );
}

function DeleteNotif(userId) {
  var ref = firebase.database().ref('notif/' + userId);
  ref.remove();
  NotifOut();
}

function NotifIn() {
  var ref = firebase.database().ref('notif/').orderByChild('time');
  ref.on('child_added', function(snapshot) {
    console.log(snapshot);
    console.log(snapshot.val().name);
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        },
    })
    Toast.fire({
        icon: "success",
        title: snapshot.val().name + " bergabung dalam game.",
    })
  });  
}

function NotifOut() {
  var ref = firebase.database().ref('notif/');
  ref.on('child_removed', function(snapshot) {
      
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        },
    })
    Toast.fire({
        icon: "error",
        title: snapshot.val().name + " telah dikeluarkan dari game.",
    })

    
  });  
}

// function CountNotif() {
//   var ref = firebase.database().ref('notif/');
//   ref.on("value", function(snapshot) {
//     var newPost = snapshot.val();
//     if (newPost == null) {
//       var countKey = 0 ;
//     } else {
//       var countKey = Object.keys(newPost).length;
//     }
//     document.getElementById('count_player').innerText = countKey;
//     }, function (errorObject) {
//       console.log(errorObject);
//     }
//   )
// }

// function DataPlayer() {
//   ref.on("child_added", function(snapshot, prevChildKey) {
//     var newPost = snapshot.val();
//     console.log("Name: " + newPost.name);
//     console.log("Previous ID: " + prevChildKey);

//   });
// }


// function InsertNotif(userId, name) {
//   var starCountRef = firebase.database().ref('notif/' + userId + '/starCount');
//   starCountRef.on('value', function(snapshot) {
//     updateStarCount(postElement, snapshot.val());
//   });
// }