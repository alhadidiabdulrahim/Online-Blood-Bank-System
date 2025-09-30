//List items
draggableListItems = document.querySelectorAll('.draggable-list li');
//End message
result = document.getElementById('result');
//list A head
listHeadA = document.getElementById("listheaderA");
//list B head
listHeadB = document.getElementById("listheaderB");
//List box
listBox = document.getElementById("listBox");

//Hise end meesage at first
result.style.display = 'none';

// current phrase being dragged
let selectedId;

// target phrase
let dropTargetId;

// counter for correct phrases
let matchingCounter = 0;

//call addEventListeners function
addEventListeners();

//drage and drop fuvtiuons
function dragStart() {
  selectedId = this.id;
}

function dragEnter() {
  this.classList.add('over');
}

function dragLeave() {
  this.classList.remove('over');
}

function dragOver(ev) {
  ev.preventDefault();
}

function dragDrop() {
  dropTargetId = this.id;
  //if match hide both selected and selected to(list A to List B)
  if (checkForMatchA2B(selectedId, dropTargetId)) {
    document.getElementById(selectedId).style.display = 'none';
    document.getElementById(dropTargetId).style.display = 'none';
    matchingCounter++;
    //if match hide both selected and selected to(list B to List A)
  }else if (checkForMatchB2A(selectedId, dropTargetId)) {
    document.getElementById(selectedId).style.display = 'none';
    document.getElementById(dropTargetId).style.display = 'none';
    matchingCounter++;
  }
  //if user get all matches show end messages
  if (matchingCounter === 5) {
    result.style.display = 'block';
    listHeadA.style.display = 'none';
    listHeadB.style.display = 'none';
    listBox.style.display = 'none';

  }

  this.classList.remove('over');
}

// check for from list A to list B
function checkForMatchA2B(selected, dropTarget) {
  switch (selected) {
    case 'd1':
      return dropTarget === 'p1' ? true : false;

    case 'd2':
      return dropTarget === 'p2' ? true : false;

    case 'd3':
      return dropTarget === 'p3' ? true : false;

    case 'd4':
      return dropTarget === 'p4' ? true : false;

    case 'd5':
      return dropTarget === 'p5' ? true : false;

    default:
      return false;
  }
}

// check for from list B to list A
function checkForMatchB2A(selected, dropTarget) {
  switch (selected) {
    case 'p1':
      return dropTarget === 'd1' ? true : false;

    case 'p2':
      return dropTarget === 'd2' ? true : false;

    case 'p3':
      return dropTarget === 'd3' ? true : false;

    case 'p4':
      return dropTarget === 'd4' ? true : false;

    case 'p5':
      return dropTarget === 'd5' ? true : false;

    default:
      return false;
  }
}
//Reset the game
function playAgain() {
  matchingCounter = 0;
  // Hide end message
  result.style.display = 'none';
  // display list A and B
  listHeadA.style.display = 'block';
  listHeadB.style.display = 'block';
  listBox.style.display = 'block';

  draggableListItems.forEach(item => {
    document.getElementById(item.id).style.display = 'block';
  })
}

function addEventListeners() {
  draggableListItems.forEach (item => {
    item.addEventListener('dragstart', dragStart);
    item.addEventListener('dragenter', dragEnter);
    item.addEventListener('drop', dragDrop);
    item.addEventListener('dragover', dragOver);
    item.addEventListener('dragleave', dragLeave);
  })
}