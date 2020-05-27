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



function InsertNotif(room, id_user, time, name) {
  // firebase.database().ref('notif/' + room).set({
  //   id_user: id_user,
  //   time: time, 
  //   name: name
  // },function(error) {
  //     if (error) {
  //       Swal.fire(
  //         'Oops...',
  //         'Terjadi kesalahan ...',
  //         'error'
  //       )
  //     } else {
  //       // Swal.fire(
  //       //   'Berhasil Gabung Game',
  //       //   'Silahkan tunggu sampai game dimulai ...',
  //       //   'success'
  //       // )
  //       Swal.fire({
  //         icon: "success",
  //         title: 'Berhasil Gabung Game',
  //         text: 'Silahkan tunggu sampai game dimulai ...',
  //         // onBeforeOpen: () => {
  //         //   NotifIn();
  //         // },
  //         onClose: () => {
  //           NotifIn();
  //         }
  //       })
        
  //     }
  //   }
  // );

  var ref = firebase.database().ref('notif/' + room);
  ref.once('value').then(function(snapshot) {
      ref.child(id_user).set({
        id_user: id_user,
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
            
            Swal.fire({
              icon: "success",
              title: 'Berhasil Gabung Game',
              text: 'Silahkan tunggu sampai game dimulai ...',
              onClose: () => {
                NotifIn(room);
              }
            })
            
          }
        })
  });
}

function DeleteNotif(room, id_user) {
  var ref = firebase.database().ref('notif/' + room + '/' + id_user);
  ref.remove();
  NotifOut(room);
}

function NotifIn(room) {
  var ref = firebase.database().ref('notif/' + room).orderByChild('time');
  ref.on('child_added', function(snapshot) {
    console.log(snapshot);
    console.log(snapshot.val().name);
    console.log(snapshot.val().time);
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

function NotifOut(room) {
  var ref = firebase.database().ref('notif/' + room);
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

function MulaiGame(room, data_player) {
  firebase.database().ref('ingame/' + room).set(data_player);
};

function InGame(room) {
  var ref = firebase.database().ref('ingame/' + room).orderByChild('ranked');
  ref.on('value', function(snapshot) {
    var room = snapshot.key;
    console.log(snapshot.val());
    
    var wrapper = document.getElementById("player_played");
    var html = '';
    snapshot.forEach(function(childSnapshot) {
      var childKey = childSnapshot.key;
      var childData = childSnapshot.val();

        html += '<div class="col-sm-12"> ';
        html += '<div class="card-player-played">';
          html += '<div class="col-rank">Rank <div class="rank">'+childData.ranked+'</div></div>'
          html += '<div class="col-img"><img src="'+childData.avatar+'"/></div>';
          html += '<div class="col-name">';
            html += '<div class="name"><b>'+childData.nama+'</b></div>';
          html += '</div>';
          html += '<div class="col-progress">';
            html += '<div class="container-progressed">';
              html += '<div class="progressed">'+childData.progress+'</div>';
            html += '</div>';
            html += '<progress value="0" max="10"></progress>';
          html += '</div>';
          html += '<div class="col-point">Point <div class="point">'+childData.point+'</div></div>';
        html += '</div>';
        html += '</div>';
    });
    
    wrapper.innerHTML = html;
    
  });
}

function CountInGame(room) {
  var ref = firebase.database().ref('ingame/' + room);
  ref.on("value", function(snapshot) {
    var newPost = snapshot.val();
    if (newPost == null) {
      var countKey = 0 ;
    } else {
      var countKey = Object.keys(newPost).length;
    }
    document.getElementById('count_player_play').innerText = countKey;
    }, function (errorObject) {
      console.log(errorObject);
    }
  )
}

function EndGame(room) {
  var ref = firebase.database().ref('ingame/' + room);
  ref.remove();
  var ref2 = firebase.database().ref('notif/' + room);
  ref2.remove();
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