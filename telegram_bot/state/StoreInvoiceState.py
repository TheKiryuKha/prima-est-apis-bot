from aiogram.fsm.state import StatesGroup, State

class StoreInvoiceState(StatesGroup):
    regData = State()
    waitingForPayment = State()