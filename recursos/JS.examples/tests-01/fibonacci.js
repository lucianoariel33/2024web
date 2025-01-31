

const fibonacciSeries = (n) => {
    let i;
    const fib = [0, 1]; 
    
    for (i = 2; i <= n; i++) {
      fib[i] = fib[i - 2] + fib[i - 1];
    }

    return fib;
};

console.log(
    `Fibonacci series (n=10):`, 
    fibonacciSeries(10)
);
