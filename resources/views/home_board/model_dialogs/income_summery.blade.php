<!-- Deposit Action Sheet -->
<div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Balance</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <form>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="account1">From</label>
                                <select class="form-control custom-select" id="account1">
                                    <option value="0">Savings (*** 5019)</option>
                                    <option value="1">Investment (*** 6212)</option>
                                    <option value="2">Mortgage (*** 5021)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <label class="label">Enter Amount</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addona1">$</span>
                                <input type="text" class="form-control" placeholder="Enter an amount"
                                       value="100">
                            </div>
                        </div>


                        <div class="form-group basic">
                            <button type="button" class="btn btn-primary btn-block btn-lg"
                                    data-bs-dismiss="modal">Deposit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Deposit Action Sheet -->