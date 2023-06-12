import React, {useState} from "react";

import './App.css';

import { Board } from "./components/Board"
import { ScoreBoard } from "./components/ScoreBoard";
import { ResetButton } from "./components/ResetButton";
import { Quit } from "./components/Quit";

function App() {

// lista warunków zwycięstwa
  const WIN_CONDITIONS = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
  ]

  const [board, setBoard] = useState(Array(9).fill(null)); //Ustawienie pustej planszy
  const [xPlaying, setXPlaying] = useState(false); //Domyślne ustawienie gracza jako "O"
  const [scores, setScores] = useState({ xScore: 0, oScore: 0 }) //Zerowanie Wyników
  const [gameOver, setGameOver] = useState(false); //Stan końca gry, początkowo false


// funkcja obsługująca kliknięcie na pole planszy
  const handleBoxClick = (boxIdx) => {
    const updatedBoard = board.map((value, idx) => {
      if (idx === boxIdx) {
        return xPlaying ? "X" : "O"; // wartość na polu jest ustawiana na X lub O, w zależności od tego, czy gra gracz X czy O
      } else {
        return value;
      }
    })

    const winner = checkWinner(updatedBoard); // sprawdzenie, czy któryś z graczy wygrał

    //Przypisanie wyników 
    if (winner) { //jeśli gra została wygrana
      if (winner === "O") {
        let { oScore } = scores;
        oScore += 1;
        setScores({ ...scores, oScore })
      } else {
        let { xScore } = scores;
        xScore += 1;
        setScores({ ...scores, xScore })
      }
    } else if (!winner && !updatedBoard.includes(null)) { //jeśli nie ma już pustych pól na planszy
      setGameOver(true);
    } else {
      // Jeśli nie ma jeszcze zwycięzcy, a gra jeszcze się nie skończyła, tura komputera
      const emptyBoxes = updatedBoard.reduce((acc, val, idx) => {
        if (!val) {
          acc.push(idx);
        }
        return acc;
      }, []);
  
      // Losowo wybiera puste pole, aby umieścić ruch komputera
      const computerMove = emptyBoxes[Math.floor(Math.random() * emptyBoxes.length)];
      updatedBoard[computerMove] = xPlaying ? "O" : "X";
  
      // Sprawdzenie, czy po ruchu komputera jest zwycięzca
      const computerWinner = checkWinner(updatedBoard);
  
      if (computerWinner) {
        // Jeśli komputer wygra, zaaktualizuj wyniki i ustaw grę jako zakończoną
        if (computerWinner === "O") {
          let { oScore } = scores;
          oScore += 1;
          setScores({ ...scores, oScore })
        } else {
          let { xScore } = scores;
          xScore += 1;
          setScores({ ...scores, xScore })
        }
        setGameOver(true);
      }
    }

    // Aktualizacja planszy
    setBoard(updatedBoard);

  }

  // Sprawdzenie czy jest wygrany na podstawie aktualnego stanu planszy
  const checkWinner = (board) => {
    for (let i = 0; i < WIN_CONDITIONS.length; i++) {
      const [x, y, z] = WIN_CONDITIONS[i];

      if (board[x] && board[x] === board[y] && board[y] === board[z]) {
        setGameOver(true);
        return board[x];
      }
    }
  }


  // Funkcja resetuje planszę do stanu początkowego i rozpoczyna nową grę
  const resetBoard = (startingPlayer) => {
    setGameOver(false);
    setBoard(Array(9).fill(null));
    setXPlaying(startingPlayer === "X" ? true : false);
  };

  //Chwilowo na czas przebudowy
  const quit = () => {
  };


  return (
    <div className="App">
      <ScoreBoard scores = {scores} xPlaing={xPlaying}/>
      <Board board={board} onClick={gameOver ? resetBoard : handleBoxClick}/>
      <ResetButton resetBoard={resetBoard}/>
      <Quit quit={quit}/>
      <button onClick={() => resetBoard("X")}>Wybierz X</button>
      <button onClick={() => resetBoard("O")}>Wybierz O</button>
      
    </div>
  );
}

export default App;
