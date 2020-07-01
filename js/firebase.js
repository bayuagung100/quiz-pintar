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
    // console.log(snapshot);
    // console.log(snapshot.val().name);
    // console.log(snapshot.val().time);
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
  // firebase.database().ref('ingame/' + room).set(data_player);
  var ref = firebase.database().ref('ingame/' + room);
  var ref2 = firebase.database().ref('timer/' + room);
      ref.set(data_player).then(() => {
        console.log('Set ingame sukses '+room);
      })

      ref2.set(data_player).then(() => {
        console.log('Set timer sukses '+room);
      })
}
// function MulaiGame2(room) {
//   firebase.database().ref('timer/' + room).set({
//     batas:"60:00",
//     panjang:100
//   });
// };

function InGame(room) {
  var ref = firebase.database().ref('ingame/' + room).orderByChild('ranked');
  ref.on('value', function(snapshot) {
    var room = snapshot.key;
    // console.log(snapshot.val());
    
    var wrapper = document.getElementById("player_played");
    var html = '';
    snapshot.forEach(function(childSnapshot) {
      var childKey = childSnapshot.key;
      var childData = childSnapshot.val();
      var pisah = childData.progress.split('/');
      var val = pisah[0];
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
            html += '<progress value="'+val+'" max="10"></progress>';
          html += '</div>';
          html += '<div class="col-point">Point <div class="point">'+childData.point+'</div></div>';
        html += '</div>';
        html += '</div>';
    });
    
    wrapper.innerHTML = html;
    
  });
}

function TimerGame(params) {
  var path = window.location.href;
  var ex = path.split('play/');
  var url = ex[0];
  var cd = ex[1];
  console.log(url+":"+cd);
  var ref = firebase.database().ref('timer/' + cd);
  var elem = document.getElementById("timeLeft");
  var interval = setInterval(function() {
      $.ajax({
          type: "POST",
          url: url+"ajax/room/cek-status-play.php",
          data: {
              code_room : cd,
          },
          dataType: 'json',
          success: function(response) {
              if (response.data[0].status=='end'){
                  clearInterval(interval)
                  let timerInterval
                  Swal.fire({
                      title: 'Game Berakhir!',
                      html: 'Dalam waktu <b></b> detik.',
                      timer: 5000,
                      timerProgressBar: true,
                      onBeforeOpen: () => {
                          Swal.showLoading()
                          timerInterval = setInterval(() => {
                          const content = Swal.getContent()
                          if (content) {
                              const b = content.querySelector('b')
                              if (b) {
                              b.textContent = Math.ceil(swal.getTimerLeft() / 1000)
                              }
                          }
                          }, 100)
                      },
                      onClose: () => {
                          clearInterval(timerInterval)
                      }
                      }).then((result) => {
                      if (result.dismiss === Swal.DismissReason.timer) {
                          window.location.href = response.data[0].url;
                      }
                  });
              } else {
                  ref.once('value', function(snapshot) {
                  var key = snapshot.key;
                  val = snapshot.val(); 
                  batas = val.batas;
                  panjang = val.panjang;
                  var timer = batas.split(':');
                  var minutes = parseInt(timer[0], 10);
                  var seconds = parseInt(timer[1], 10);
                  --seconds;
                  minutes = (seconds < 0) ? --minutes : minutes;
                  if (minutes < 0) clearInterval(interval);
                  seconds = (seconds < 0) ? 59 : seconds;
                  seconds = (seconds < 10) ? '0' + seconds : seconds;
                  //minutes = (minutes < 10) ?  minutes : minutes;
                  $('#time').html(minutes + ':' + seconds);
                  // console.log(val);
                  // console.log(minutes);
                  // console.log(seconds);
                  // console.log(val);
                  // console.log(" waktu: "+batas);
                  // console.log(" width: "+panjang);
              
                  pisah = batas.split(':');
                  min = pisah[0];
                  min = (min == 0) ? 01 : min;
                  sec = pisah[1];
                  detik = min*60;
                  j = 100/detik;
                  k = 250/detik;
                  width = panjang;
                  point = 2500;
                  ttl_soal = 10;
                  // var id = setInterval(frame, 1000);
                  // function frame() {
                      if (width <= 0) {
                          clearInterval(interval);
                          Swal.fire({
                              title: 'Waktu Sudah Habis!',
                          });
                          $('#section_murid').hide();
                          $('#section_show_lederboard').show();
                          ShowLeaderboardCount(cd);
                          ShowLeaderboard(cd);
                      } else {
                          width=width-j;
                          point=point-k;
                          console.log("sisa min: "+min);
                          console.log("sisa width: "+width);
                          // console.log("sisa point (bulat): "+parseInt(point));
                          // console.log("sisa point: "+point);
                          elem.style.width = width + "%";
                      }
                  // }

                  ref.update(
                      {
                          batas: minutes+":"+seconds,
                          panjang: width
                      }
                  )
                  // ref.once('value', function(snapshot) {
                  //     var key = snapshot.key;
                  //     value = snapshot.val(); 
                  //     console.log(value);
                  //     console.log("sisa waktu: "+batas);
                  //     console.log("sisa width: "+width);
                  // })
                  
              });
              }
          }
      });
    
  },1000);
}

function InGameMurid(room, id_user) {
  
  var InGameMuridRank = document.getElementById('InGameMuridRank');
  var InGameMuridPoint = document.getElementById('InGameMuridPoint');
  
  var ref = firebase.database().ref('ingame/' + room + '/' + id_user);
  
  ref.on('value', function(snapshot) {
    var dataKey = snapshot.key;
    var Data = snapshot.val();
    // snapshot.forEach(function(childSnapshot) {
      
      // var childKey = childSnapshot.key;
      // var childData = childSnapshot.val();
      // console.log(Data);
      // if (childData.id_player == id_user) {
        
        InGameMuridRank.innerText = Data.ranked;
        InGameMuridPoint.innerText = Data.point;
      // }
      
    // })
  })
}

function InGameMuridUpdate(room, id_user, point, progress, ranked) {
  var ref = firebase.database().ref('ingame/' + room);
  ref.once('value', function(snapshot) {
    // var dataKey = snapshot.key;
    // var Data = snapshot.val();
    snapshot.forEach(function(childSnapshot) {
      var childKey = childSnapshot.key;
      var childData = childSnapshot.val();
      if (childData.id_player == id_user) {
        ref.child(childKey).update(
          {
            'point': point,
            'progress': progress,
            'ranked': ranked
          }
        )
      }
    })
  })
}

function ShowLeaderboard(room) {
  var ref = firebase.database().ref('ingame/' + room).orderByChild('ranked');
  ref.on('value', function(snapshot) {
    var room = snapshot.key;
    // console.log(snapshot.val());
    
    var wrapper = document.getElementById("show_lederboard");
    var html = '';
    snapshot.forEach(function(childSnapshot) {
      var childKey = childSnapshot.key;
      var childData = childSnapshot.val();
      var pisah = childData.progress.split('/');
      var val = pisah[0];

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
            html += '<progress value="'+val+'" max="10"></progress>';
          html += '</div>';
          html += '<div class="col-point">Point <div class="point">'+childData.point+'</div></div>';
        html += '</div>';
        html += '</div>';
    });
    
    wrapper.innerHTML = html;
    
  });
}

function ShowLeaderboardCount(room) {
  var ref = firebase.database().ref('ingame/' + room);
  ref.on("value", function(snapshot) {
    var newPost = snapshot.val();
    if (newPost == null) {
      var countKey = 0 ;
    } else {
      var countKey = Object.keys(newPost).length;
    }
    document.getElementById('show_lederboard_count').innerText = countKey;
    }, function (errorObject) {
      console.log(errorObject);
    }
  )
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
  ref.remove().then(() => {
    console.log('remove ingame sukses '+room);
  });
  var ref2 = firebase.database().ref('notif/' + room);
  ref2.remove().then(() => {
    console.log('remove notif sukses '+room);
  });
  var ref3 = firebase.database().ref('timer/' + room);
  ref3.remove().then(() => {
    console.log('remove timer sukses '+room);
  });
}
// function EndGame2(room) {
//   var ref2 = firebase.database().ref('notif/' + room);
//   ref2.remove().then(() => {
//     console.log('remove notif sukses '+room);
//   });
// }
// function EndGame3(room) {
//   var ref3 = firebase.database().ref('timer/' + room);
//   ref3.remove().then(() => {
//     console.log('remove timer sukses '+room);
//   });
// }

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