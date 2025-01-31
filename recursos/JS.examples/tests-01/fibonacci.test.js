const fibonacciSeries = (n) => {
    let i;
    const fib = [0, 1]; 
    
    for (i = 2; i <= n; i++) {
      fib[i] = fib[i - 2] + fib[i - 1];
    }

    return fib;
};

describe('fibonacciSeries', () => {
    // Generates correct Fibonacci series for n = 0
    it('should return [0, 1] when n is 0', () => {
        const result = fibonacciSeries(0);
        expect(result).toEqual([0, 1]);
    });
  
    // Handles negative input values gracefully
    it('should return [0, 1] when n is negative', () => {
        const result = fibonacciSeries(-5);
        expect(result).toEqual([0, 1]);
    });
  
    // Generates correct Fibonacci series for n = 1
    it('should return [0, 1, 1] when n is 2', () => {
        const result = fibonacciSeries(2);
        expect(result).toEqual([0, 1, 1]);
    });
  
    // Generates correct Fibonacci series for n = 5
    it('should return [0, 1, 1, 2, 3, 5] when n is 5', () => {
        const result = fibonacciSeries(5);
        expect(result).toEqual([0, 1, 1, 2, 3, 5]);
    });
  
    // Ensures result is consistent and repeatable
    it('should return the same Fibonacci series when called twice with n = 3', () => {
        const result1 = fibonacciSeries(3);
        const result2 = fibonacciSeries(3);
        expect(result1).toEqual(result2);
    });
  });
  
  