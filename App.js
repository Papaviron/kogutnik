import React, { useState } from 'react';
import './App.css';


const App = () => {
  
  const [level, setLevel] = useState('easy');
  const [number, setNumber] = useState(null);
  const [guess, setGuess] = useState('');
  const [message, setMessage] = useState('');

  const generateRandomNumber = (min, max) => {
    return Math.floor(Math.random() * (max - min + 1) + min);
  };

  const startApp = () => {
    let min, max;
    switch (level) {
      case 'easy':
        min = 1;
        max = 10;
        break;
      case 'medium':
        min = 1;
        max = 50;
        break;
      case 'hard':
        min = 1;
        max = 100;
        break;
      case 'extreme':
        min = 1;
        max = 1000;
        break;
      default:
        min = 1;
        max = 10;
    }
    setNumber(generateRandomNumber(min, max));
    setMessage('');
    setGuess('');
  };

  const handleGuess = () => {
    const parsedGuess = parseInt(guess, 10);
    if (isNaN(parsedGuess)) {
      setMessage('Podaj liczbę!');
    } else if (parsedGuess === number) {
      setMessage('Brawo! Odgadłeś liczbę!');
    } else if (parsedGuess < number) {
      setMessage('Szukana liczba jest większa!');
    } else if (parsedGuess > number) {
      setMessage('Szukana liczba jest mniejsza!');
    }
    setGuess('');
  };

  const exitApp = () => {
    setLevel('easy');
    setNumber(null);
    setGuess('');
    setMessage('');
  };

  return (
    <div className="container">
      <h1>Zgadnij liczbę</h1>
      <label>
        Poziom trudności:
        <select value={level} onChange={(e) => setLevel(e.target.value)}>
          <option value="easy">Łatwy (1-10)</option>
          <option value="medium">Średni (1-50)</option>
          <option value="hard">Trudny (1-100)</option>
          <option value="extreme">Extreme (1-1000)</option>
        </select>
      </label>
      <br />
      <button onClick={startApp}>Rozpocznij grę</button>
      <br />
      <input
        type="text"
        placeholder="Podaj liczbę"
        value={guess}
        onChange={(e) => setGuess(e.target.value)}
      />
      <button onClick={handleGuess}>Sprawdź</button>
      <br />
      <p>{message}</p>
      <button onClick={exitApp}>Wyjdź</button>
    </div>
  );
};

export default App;