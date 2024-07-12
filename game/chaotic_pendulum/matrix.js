function NewMatrix(dim){// new dim x dim square matrix 
    return Array.from(Array(dim), () => new Array(dim));
}
function NewArray(dim){// new array
    return Array(dim);
}
function Fill(matrix,number){// fill the matrix with number
    for(var i=0;i<matrix.length;i++){
        for(var j=0;j<matrix[i].length;j++){
            matrix[i][j]=number;
        }
    }
}
function Backward(matrix,b){
    // matrix is a up triangular matrix
    let dim = matrix.length;
    solution = NewArray(dim);
    for(var i=dim-1;i>=0;i--){
        solution[i]=b[i];

        for(var j=dim-1;j>i;j--){
            solution[i]-=matrix[i][j]*solution[j];

        }
        solution[i]/=matrix[i][i];

    }
    return solution;
}
function copy(matrix){
    let ret = NewMatrix(matrix.length);
    for(var i=0;i<matrix.length;i++){
        for(var j=0;j<matrix.length;j++){
            ret[i][j]=matrix[i][j];
        }
    }
    return ret;
}
function GEM(matrix,b){
    let ret = copy(matrix);
    for(var l=0;l<matrix.length;l++){
        for(var k=l+1;k<matrix.length;k++){
            ret_kl=ret[k][l];
            ret[k][l]=0;
            for(var i=l+1;i<matrix.length;i++){
                ret[k][i]-=ret[l][i]*ret_kl/ret[l][l];
            }
            b[k]-=b[l]*ret_kl/ret[l][l];
        }
    }
    return Backward(ret,b);
}

function print(matrix){
    s='';
    for(var i=0;i<matrix.length;i++){
        for(var j=0;j<matrix.length;j++){
            s+=`${matrix[i][j]} `;
            // console.log(`${i},${j},${matrix[i][j]}\n`);
        }
        s+='\n';
    }
    console.log(s);
}
function print_(array){
    s='';
    for(var i=0;i<array.length;i++){
        s+=`${i}:${array[i]} `;
    }
    console.log(s);
}

function solve(mat,b){
    b_cpy= NewArray(mat.length); //求解过程会改变b，这里复制一份
    for(var i=0;i<mat.length;i++){
        b_cpy[i]=b[i];
    }
    sol = GEM(mat,b_cpy);
    return sol;
}
function sum(array){// get the sum of an array
    var sum_ = 0;
    for(var i=0;i<array.length;i++){
        sum_ += array[i];
    }
    return sum_;
}