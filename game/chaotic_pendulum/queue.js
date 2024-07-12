class LoopQueue{
  constructor(length){
    this.length = length; 
    this.array = NewArray(length);
    this.pointer = 0;
  };
  next(){
    this.pointer = (this.pointer + 1) % this.length;
  };
  push(number){ 
    this.array[this.pointer] = number ; 
    this.next();
  }
  get(index){
    // index :from 0 to this.length-1;
    return this.array[(this.pointer+index) % this.length];
  }
}
// orb_len = 10;
// var a = new LoopQueue(orb_len);
// a.push({'1':1})
// a.push({'2':2})
// for(var i=0;i<a.length;i++){
//     a.push({i : i});
// }
// for(var i=0;i<a.length;i++){
//     console.log(a.get(i));
// }